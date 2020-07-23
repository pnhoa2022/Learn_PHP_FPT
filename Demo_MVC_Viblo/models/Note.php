<?php

class Note
{
    public $IDNote;

    public $Title;
    public $Content;

    public $CreatedBy;
    public $UpdatedBy;
    public $CreatedDate;
    public $UpdatedDate;
    public $Version;
    public $Enabled;

    function __construct()
    {
        $a = func_get_args(); //mảng danh sách đối số truyền vào
        $i = func_num_args(); //số lượng đối số truyền vào

        $f = '__construct'.$i; //tên của __construct nối chuỗi với số $i

        if (method_exists($this, $f)) { //Kiểm tra tên function tồn tại k
            call_user_func_array(array($this,$f),$a); //gọi function đó
        }
    }

    function __construct3($IDNote, $Title, $Content)
    {
        $this->IDNote = $IDNote;
        $this->Title = $Title;
        $this->Content = $Content;
    }

    function __construct2($Title, $Content)
    {
        $this->Title = $Title;
        $this->Content = $Content;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();

        $query_select = "SELECT * FROM Note WHERE Enabled = TRUE;";

        $result_select = $db->query($query_select);
        $rowData = $result_select->fetchAll();

        foreach ($rowData as $item) {
            $list[] = new Note($item['IDNote'], $item['Title'], $item['Content']);
        }

        return $list;
    }

    static function show($IDNote) {
        //Kết nốt DB
        $db = DB::getInstance();

        //Truy vấn DB
        $query_select = "SELECT * FROM Note WHERE Enabled = TRUE AND IDNote = $IDNote;";
        $result_select = $db->query($query_select);
        $item = $result_select->fetch();

        if (!isset($item['IDNote'])) {
            return null;
        }

        return new Note($item['IDNote'], $item['Title'], $item['Content']);
    }
}

?>