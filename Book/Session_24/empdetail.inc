<?php

class empdetail
{
    var $empid;
    var $empname;
    var $empcity;

    var $empdept;
    var $empdesign;

    function enteremp($id, $name, $city)
    {
        $this->empid = $id;
        $this->empname = $name;
        $this->empcity = $city;
    }

    function enterdet($dept, $design)
    {
        $this->empdept = $dept;
        $this->empdesign = $design;
    }
}

?>