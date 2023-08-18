<?
class NotesController
{
    function submit()
    {
        if (isset($_POST['title'])) {

            // $msg = "شما قبلا وارد سیستم شده اید " . "<a href=" . getBaseUrl() . "page/home" . "> اینجا</a>" .
            //     "برای ورود کلیک کنید " . "<br>" . "برای خارج شدن کلیک کنید" . "<a href=" . getBaseUrl() . "user/loguot>خروج</a>";
            // require_once('mvc/view/message/success.php');
            // exit;
            $this->submitNote();
        } else {

            Render::render('note/submit.php', array());
        }
    }
    function submitNote()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $time = $_POST['time'];
        $un = $_SESSION['uname'];
        NoteModel::insert($id, $title, $text, $time, $un);
     
    }
}
