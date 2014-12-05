<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		models/views.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
class views{
    public function getView($filename="", $data=array()){   
        include $filename;
    }
}
?>