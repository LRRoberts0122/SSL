<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well profile">
	            <? if(is_string($data)) {
		            ?>
		            	<h1>Error!</h1>
		            	<p><? echo $data ?> <a href="/ssl/Lab5/">Go Back</a></p>
		            	
		            <?
	            } else {
		            ?>
		            <h1><small>Weather for <? echo $data['location'][0]["city"] ?>, <? echo $data['location'][0]['region'] ?></small></h1>
		            <small><? echo $data['current']['date'] ?></small>
		            <hr />
		            <div class="left">
		            	<p class="temp"><? echo $data['current']['temp'] ?>&deg;F</p>
		            </div>
		            <div class="right">
		            	<img src="http://l.yimg.com/a/i/us/we/52/<? echo $data['current']['code'] ?>.gif" />
						<p><? echo $data['current']['text'] ?></p>
		            </div>
		            
		            
		            
		            <div class="clear"></div>
		            <p><b>Forecast:</b></p>
		            <p><? echo $data['forecast'][0]['day'] ?> - <? echo $data['forecast'][0]['text'] ?>. High: <? echo $data['forecast'][0]['high'] ?> Low: <? echo $data['forecast'][0]['low'] ?></p>
		            <?
	            }
	            ?>
            </div>
    	</div>
	</div>
</div>