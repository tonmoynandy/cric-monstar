<?php  $current_class = $this->router->class;$current_method = $this->router->method;  ?>
<div class="navbar-wrapper" style="<?php //echo ($current_method=='index')? 'top:20px;':'top:0px;'  ?>">
        <div class="container">

            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0px;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo FRONTEND_URL; ?>">
                        	<img src="<?php echo FRONTEND_IMAGE_PATH.'cric_logo.png' ?>" width='50' />
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            
                            <li class="mainNavLi">
                            	<a href="http://www.jssor.com/demos/index.html">Series</a>
                            	<ul>
                            		<?php
                            		 if(is_array($activeSeries) and count($activeSeries)>0){
                            		 	foreach($activeSeries as $ser){?>
                            		 	<li>
                            		 		<a href="<?php echo FRONTEND_URL.'series/'.$ser['series_slug'] ?>">
                            		 			<?php echo stripslashes($ser['s_name']) ?>
                            		 		</a>
                            		 	</li>	
                            		<?php 	}
                            		 }
                            		?>
                            	</ul>
                            </li>
                            <li class="mainNavLi">
                            	<a href="#">Schedule</a>
                            	<ul>
                            		<?php
                            		 if(is_array($activeSchedule) and count($activeSchedule)>0){
                            		 	foreach($activeSchedule as $ser){?>
                            		 	<li>
                            		 		<a href="<?php echo FRONTEND_URL.'series/'.$ser['series_slug'] ?>">
                            		 			<?php echo stripslashes($ser['s_name']) ?>
                            		 		</a>
                            		 	</li>	
                            		<?php 	}
                            		 }
                            		?>
                            	</ul>
                            </li>
                            <li class="mainNavLi"><a href="<?php echo FRONTEND_URL.'news' ?>">News</a></li>
                            
                        </ul>
                        <ul class="nav pull-right">
                        	<li>
                        		<form action="<?php echo FRONTEND_URL.'search' ?>" method="get">
                        			<input type="text" placeholder="search" class="form-control" />
                        			
                        		</form>
                        	</li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
