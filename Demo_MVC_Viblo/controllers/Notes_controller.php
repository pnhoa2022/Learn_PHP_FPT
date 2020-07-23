<?php

require_once 'base_controller.php';
require_once 'models/Note.php';


class NotesController extends BaseController
{
    function NotesController() {
        $this->folder = "Notes";
    }

    public function index() {
        $Notes = Note::all();

        $data = array('Notes' => $Notes);

        $this->render('index', $data);
    }

    public function show() {
        $IDNote = $_GET['IDNote'];
        $Note = Note::show($IDNote);

        $data = array('Note' => $Note);

        $this->render('show', $data);
    }
}


?>