<? class NoteModel
{
    public static  function insert($id, $title, $text, $time, $un)
    {
        $db = Db::getInstance();
        $db->insert("insert into x_note (noteID,noteTitle,noteText,noteTime,username) values  ('$id','$title','$text','$time','$un')");
        header("Location: " . getBaseUrl() . "page/home");
    }
    public static  function delete($id)
    {
        $db = Db::getInstance();
        $db->modify("delete from x_note where noteID='$id'");
        header("Location: " . getBaseUrl() . "page/home");
    }
    public static function allNotes($un)
    {
        $db = Db::getInstance();
        $sql = "select * from x_note where username='$un'";
        $records = $db->query($sql);
        return $records;
    }
    public static function edit($nid, $ntitle, $ntext, $ntime, $un)
    {
        $db = Db::getInstance();
        $sql = "update x_note set noteTitle='$ntitle',noteText='$ntext',noteTime='$ntime' where noteID='$nid'";
        $rowAffect = $db->modify($sql);
        return $rowAffect;
    }
}
