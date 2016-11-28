<?php
 	   //set_time_limit(0); 	 


	   require_once 'simple_html_dom.php';
	   include('cron_function.php');  
	 
	   
	  
	function update_news(){
		
		//$url  = 'http://www.oneindia.com/rss/news-sports-fb.xml';
		//$url  = 'http://www.espncricinfo.com/rss/content/story/feeds/0.xml';
		$url = "http://ibnlive.in.com/ibnrss/rss/cricketnext/cricketnext.xml";
		$filename = 'news_cron.txt'; 
		
		 $html = get_content($url);
		
		file_put_contents($filename, $html);
		
		$html = file_get_contents($filename);
		//echo $html;die;
		$html = str_get_html($html);
		if($html){
		
		 	$news_arr =array();
			
			foreach($html->find('item') as $index=>$data){
				
				$time = str_replace('+0530', '', $data->find('pubDate',0)->xmltext);
				$time = trim($time);
				$time = date('Y-m-d H:i:s', strtotime($time));
				if(date('Y-m-d') == date('Y-m-d',strtotime($time)))
				{
					$news_arr[$index]['news_date_time'] 	= addslashes(trim($time));	
						
					$news_arr[$index]['news_title'] 		= addslashes(trim($data->find('title',0)->xmltext));
					
					$news_arr[$index]['news_link'] 			= (($data->find('link',0)->xmltext));
					
					
					$desc = str_replace(array('&lt;','&gt;'), array('<','>'), $data->find('description',0)->xmltext);
					
					$news_arr[$index]['news_description'] 	= addslashes(trim(strip_tags($desc)));
					$img_html = str_get_html($desc);
					$news_arr[$index]['news_image'] 				= $img_html->find('img',0)->attr['src'];
				}
			}
			/*foreach($html->find('title') as $index=>$news){
				$news_arr[$index]['news_title'] =  trim(addslashes($news->xmltext));
			}
			foreach($html->find('description') as $index=>$news){
				$news_arr[$index]['news_description'] =  trim(addslashes($news->xmltext));
			}
			foreach($html->find('image') as $index=>$news){
				$news_arr[$index]['image'] =  trim(addslashes($news->xmltext));
			}
			foreach($html->find('pubDate') as $index=>$news){
				$news_arr[$index]['news_date_time'] =  trim(addslashes($news->xmltext));
			}
			*/
			$query = mysql_query('TRUNCATE TABLE cric_news ');
			foreach($news_arr as $news){
				$news_query='SELECT * FROM cric_news WHERE news_title = "'.$news['news_title'].'"';
				if(num_rows($news_query)>0){
					$record = row_array($news_query);
					
					updateData('cric_news',array('news_id'=>$record['news_id']),$news);
				}else{
					insertData('cric_news',$news);	
				}
				
				$news_query="";
			}
			pr($news_arr);
		}
	}

   // run mysql connect 
   mysqlConnect();
	update_news();
	updateCronDate('news');


