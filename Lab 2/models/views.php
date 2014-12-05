<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 02
 *	FILE:		models/views.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/01/2014
 *	==================================
 */
class views{
    public function getView($filename="", $data=array()){
        include $filename;
    }
}
?>