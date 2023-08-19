<?
class NotesController
{
    public function submit()
    {
        if (isset($_POST['id'])) {
            // $msg = "شما قبلا وارد سیستم شده اید " . "<a href=" . getBaseUrl() . "page/home" . "> اینجا</a>" .
            //     "برای ورود کلیک کنید " . "<br>" . "برای خارج شدن کلیک کنید" . "<a href=" . getBaseUrl() . "user/loguot>خروج</a>";
            // require_once('mvc/view/message/success.php');
            // exit;
            $this->submitNote();
        } else {
            Render::render('note/submit.php', array());
        }
    }
    /****************************************************************************************** */
    public  function submitNote()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $time = $_POST['time'];
        $un = $_SESSION['uname'];
        NoteModel::insert($id, $title, $text, $time, $un);
    }
    /******************************************************************************************/
    public  function edit($params)
    {
        $nid=$params[0];
        $ntitle=$params[1];
        $un=$_SESSION['uname'];
        $rowAffect = NoteModel::edit($nid, $ntitle, $ntext, $ntime, $un);
        Render::render('note/submit.php', array());

        if ($rowAffect) {
            $msg = "<h4>رکورد مورد نظر با موفقیت ویرایش شد.</h4> <br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
            showmsg("success", $msg, false);
        } else {
            $msg = "ویرایش رکورد با خطا روبرو شد لطفا مجددا سعی بفرمائید<br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
            showmsg('fail', $msg, true);
        }
    }
    /******************************************************************************************/
    public  function remove()
    {
        if (!isset($_GET['id'])) {
            $msg = "رکوردی برای حذف پیدا نشد";
            showmsg('fail', $msg, true);
        }
        $id = $_GET['id'];
        NoteModel::delete($id);
    }
}
