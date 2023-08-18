<? class NoteModel
{
    public static  function insert($id, $title, $text, $time, $un)
    {
        $db = Db::getInstance();

        $db->insert("insert into x_note (noteID,noteTitle,noteText,noteTime,username) values  ('$id','$title','$text','$time','$un')");
        header("Location: " . getBaseUrl() . "page/home");
    }
}
