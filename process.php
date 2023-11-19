<?php
// احصل على بيانات النموذج من متغيرات $_POST
$name = $_POST["name"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$birthday = $_POST["birthday"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
// تحقق من أن الزر register تم الضغط عليه
if (isset($_POST["register"])) {
    // تحقق من أن جميع الحقول مملوءة
    if ($name && $email && $phonenumber && $birthday && $password && $confirm_password) {
        // تحقق من أن كلمتي المرور متطابقتين
        if ($password == $confirm_password) {
            // افتح ملف لحفظ بيانات المستخدم
            $file = fopen("Data.txt", "a") or die("Unable to open file!");
            // اكتب بيانات المستخدم في صيغة CSV
            $data = "$name,$email,$phonenumber,$birthday,$password\n";
            // احفظ البيانات في الملف
            fwrite($file, $data);
            // اغلق الملف
            fclose($file);
            // اعرض رسالة نجاح
            echo "Thank you for registering your data. You can now login.";
        } else {
            // اعرض رسالة خطأ
            echo "The passwords do not match. Please try again.";
        }
    } else {
        // اعرض رسالة خطأ
        echo "Please fill in all the fields.";
    }
}
?>
