<?
class PageController
{
    function home()
    {
        if ($_SESSION['uname']) {
            $un = $_SESSION['uname'];
            $data['records'] = NoteModel::allNotes($un);
        } else {
            $data['records']  = null;
        }


        Render::render('page/home.php', $data);
    }
}
