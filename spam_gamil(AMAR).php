//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @o8_8m 
//قناه المطور @fIIlIII
// تخمط بدون متذكر المصدر تنهان
<?php
error_reporting(0);
ob_start();
header("Content-Type: application/json; charset=UTF-8");
ob_start();
date_default_timezone_set('Asia/Baghdad');
$API_KEY = "7168967537:AAGM3UAMv1i_9nCR-3DnjF4ojnj1os4Zk74" ;#توكن بوتك
define('API_KEY',$API_KEY);
define("IDBot", explode(":", $API_KEY)[0]);


function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $options = [
        'http' => [
            'method'  => 'POST',
            'content' => http_build_query($datas),
            'header'  => 'Content-Type: application/x-www-form-urlencoded\r\n',
        ],
    ];
    $context  = stream_context_create($options);
    $res = file_get_contents($url, false, $context);

    if ($res === FALSE) {
        return json_encode(['error' => 'Request failed']);
    } else {
        return json_decode($res);
    }
}

#𓏳𓏳𓏳❲ بدايه لوحه الادمن ❳𓏳𓏳𓏳
$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}
if($update->edited_message){
	$message = $update->edited_message;
	$message_id = $message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
	}
	if($update->channel_post){
	$message = $update->channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$title = $message->chat->title;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->edited_channel_post){
	$message = $update->edited_channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->inline_query){
		$inline = $update->inline_query;
		$message = $inline;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$query = $message->query;
$text = $query;
		}
	if($update->chosen_inline_result){
		$message = $update->chosen_inline_result;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$inline_message_id = $message->inline_message_id;
$message_id = $inline_message_id;
$text = $message->query;
$query = $text;
		}
		$tc = $update->message->chat->type;
		$re = $update->message->reply_to_message;
		$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[back]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
if($re){
	$forward_type = $re->forward_from->type;
$forward_name = $re->forward_from->first_name;
$forward_user = $re->forward_from->username;
	}else{
$forward_type = $message->forward_from->type;
$forward_name = $message->forward_from->first_name;
$forward_user = $message->forward_from->username;
$forward_id = $message->forward_from->id;
if($forward_name == null){
	$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$forward_title = $message->forward_from_chat->title;
	}
}
$title = $message->chat->title;
$admin = "7394753040 "; #ايديك تلكرام
///
$saiko = json_decode(file_get_contents("saiko.json"),1);
if($saiko['gch'] == null){
$saiko['gch'] = "❎";
file_put_contents("saiko.json",json_encode($saiko));
}
$xch = $saiko['ch'];
///
$members = explode("\n",file_get_contents("members.txt"));
$count = count($members) -1;
if($tc == 'private' and !in_array($from_id,$members)){
file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
}
///
$oop = $xch;
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$oop&user_id=".$from_id);
$zr = str_replace("@","",$oop);
if($saiko['ch'] != null){
if($saiko['gch'] == "✅"){
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
عذراً يجب عليك الاشتراك في القناه لتستطيع استخدام البوت ⚠️
⋄︙  $oop
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'❲ اضغط هنا ❳' ,'url'=>"t.me/$zr"]],
]])
]);return false;
}
}
}
if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "back"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($saiko['ch'] == null){
$ch = "لا توجد قناة حاليا";
}elseif($saiko['ch'] != null){
$ch = $saiko['ch'];
}
$nch = $saiko['gch'];
if($data == "2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قنوات الاشتراك الاجباري 🔽
🔢 القناة : $ch
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "3" ){
if($saiko['gch']!="✅"){
$iu = "✅";
}else{
$iu ="❎";
}
$saiko['gch'] = $iu;
file_put_contents("saiko.json",json_encode($saiko));
$nch = $saiko['gch'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "add_ch"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ارفعني ادمن في القناه وارسل معرف القناه مع @ ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "ok_ch";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if(preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم اضافه القناة الى الاشتراك الاجباري",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "no";
$saiko['ch'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if(!preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and !$data and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حدث خطاء تاكد من معرف القناة ⚠️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "del_ch" and $ch != "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم حذف القناة $ch ✅
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ch'] = null;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "del_ch" and $ch == "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
لا توجد قناة ليتم حذفها ⚠️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
}
if($data == "4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك الان ارسال رسالة الـstart ⏳
رسالة الـstart الحالية : $start
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "ok_start";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text and $saiko['ok'] == "ok_start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم تغير رسالة الـstart الى ℹ️:
$text
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
$saiko['start'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "5"){
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك رفع ادمن وحذف ادمن عن طريق الازرار 🔽
⎯ ⎯ ⎯ ⎯
يمكن للادمن التحقق من الاحصائيات فقط ⚠️
",
reply_markup=>json_encode($key)
]);
}
$ex = explode("#", $data);
if($ex[0] == "del"){
$ser = array_search($ex[1],$saiko["admin"]);
unset($saiko["admin"][$ser]);
file_put_contents("saiko.json",json_encode($saiko));
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
reply_markup=>json_encode($key)
]);
}
if($data == "add_admin"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
الان ارسل ايدي الشخص ℹ️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @T_0_M0 
//قناه المطور @izeoe
// تخمط بدون متذكر المصدر تنهان
$saiko['ok'] = "ok_admin";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text  and $from_id == $admin and $saiko['ok'] == "ok_admin" and !in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$text ليس عضو بالبوت ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
$test = $saiko['admin'];
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$test)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
العضو مرفوع ادمن ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم اضافه $text ادمن ✅
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['admin'][] = $text;
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text== "/start" and in_array($from_id,$saiko['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
$d6 = $saiko['d6'];
$d7 = $saiko['d7'];
if($data == "6"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
اضغط لتعديل على القفل و الفتح 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "d6" ){
if($saiko['d6']!="✅"){
$dp = "✅";
}else{
$dp ="❎";
}
$saiko['d6'] = $dp;
file_put_contents("saiko.json",json_encode($saiko));
$d6 = $saiko['d6'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "d7" ){
if($saiko['d7']!="✅"){
$as = "✅";
}else{
$as ="❎";
}
$saiko['d7'] = $as;
file_put_contents("saiko.json",json_encode($saiko));
$d7 = $saiko['d7'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($message and $text != "/start" and $from_id != $admin and $d7 == "✅" and !$data){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
 'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @T_0_M0 
//قناه المطور @izeoe
// تخمط بدون متذكر المصدر تنهان
if($user == null){
$user = "None";
}elseif($user != null){
$user = $user;
}
if($text == "/start" and $from_id != $admin and $d6 == "✅" and !in_array($from_id,$members)){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
تم دخول عضو جديد الى البوت ℹ️ :
الاسم : [$name]
المعرف : [@$user]
الايدي : [$from_id](tg://user?id=$from_id)
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
]);
}
#اذاعه .
if($data == "10"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
'text'=>"
ارسل الرساله التي تريد اذاعتها يمكن ان تكون (نص، صوره ، فديو، الخ) ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "send";
file_put_contents("saiko.json",json_encode($saiko));
}
if(!$data and $saiko['ok'] == 'send' and $from_id == $admin){
				foreach($members as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
	             for($i=0;$i<count($members); $i++){
$ok = bot('sendChatAction' , ['chat_id' =>$members[$i],
'action' => 'typing' ,])->ok;
if($members[$i] != "" and $ok != 1){
file_put_contents("A5.txt","$members[$i]
",FILE_APPEND);
}}
$ooo = explode("\n",file_get_contents("A5.txt"));
$iii = count($ooo) - 1;
$mmm = $count - $iii;
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
'text'=>"
تم الانتهاء من الاذاعة ✅
⎯ ⎯ ⎯ ⎯
تم ارسالها الى $mmm
لم ترسل الى $iii
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
	'reply_to_meesage_id'=>$message_id,
]);

					unlink("A5.txt");
	file_put_contents("saiko.json",json_encode($saiko));
				}
#𓏳𓏳𓏳𓏳❲ بدايه الملف ❳𓏳𓏳𓏳𓏳
$update = json_decode(file_get_contents('php://input'));
$FileName = "Emails" ;#لا تلعب هنا
$h = json_decode(file_get_contents($FileName), 1);
if ($update->message) {
    $message = $update->message;
    $message_id = $message->message_id;
    $username = $message->from->username;
    $chat_id = $message->chat->id;
    $title = isset($message->chat->title) ? $message->chat->title : '';
    $text = isset($message->text) ? $message->text : '';
    $user = $message->from->username;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
}

if ($update->callback_query) {
    $callback_query = $update->callback_query;
    $data = $callback_query->data;
    $message = $callback_query->message;
    $chat_id = $message->chat->id;
    $title = isset($message->chat->title) ? $message->chat->title : '';
    $message_id = $message->message_id;
    $name = $message->chat->first_name;
    $user = $message->chat->username;
    $from_id = $callback_query->from->id;
}
function X($data, $filename) {
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents($filename, $jsonString) !== false) {
        return true; 
    } else {
        return false; 
    }
}


if ($text == "/start") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
        اهلا بك في بوت ارسال الرسائل الإلكترونية التلقائي 
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ أضف بريدات ❳", 'callback_data' => "addmail"], ['text' => "❲ حذف البريدات ❳", 'callback_data' => "delmail"]],
                [['text' => "❲ عرض البريدات المضافه ❳", 'callback_data' => "viewmails"]],
                [['text' => "❲ ارسال رساله ❳", 'callback_data' => "sendms"]],
            ]
        ])
    ]);
    unset($h["mode"]);
X($h, $FileName);
    return false ;
}

//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @T_0_M0 
//قناه المطور @izeoe
// تخمط بدون متذكر المصدر تنهان
if($data == "backi") {
	bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
        اهلا بك في بوت ارسال الرسائل الإلكترونية التلقائي 
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ أضف بريدات ❳", 'callback_data' => "addmail"], ['text' => "❲ حذف البريدات ❳", 'callback_data' => "delmail"]],
                [['text' => "❲ عرض البريدات المضافه ❳", 'callback_data' => "viewmails"]],
                [['text' => "❲ ارسال رساله ❳", 'callback_data' => "sendms"]],
            ]
        ])
    ]);
    unset($h["mode"]);
X($h, $FileName);
    return false ;
	} 
	
if($data == "addmail") {
	bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
ارسل الان الميل مثلا ✔️
help@instagram.com
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["mode"] = $data;
X($h, $FileName);
return false ;
	}
	
	if(preg_match("/delt_/" , $text)) {
		$ma = explode("delt_", $text)[1];
		$ma = ("[". $h["mails"][$ma]. "]") ;
		if(!preg_match("/@/",$ma)) {
			bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
😅 لم يتم اضافه بريد في هذه الخانه من قبل
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    return false ;
			} 
			
		bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        الايميل تم حذفه بنجاح ✅
الاميل : $ma
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    unset($h["mails"][explode("delt_", $text)[1]]) ;
X($h, $FileName);
		} 
		
	if($data == "viewmails") {
		foreach($h["mails"] as $m) {
			$v=array_search($m,$h["mails"] ); 
			$sm = $sm."[$m] | [/delt_$v] \n";
			} 
			if(!$h["mails"]) {
				bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
🔃 احم! يبدو انك لم تقم باضافه بريدات من قبل
        *
   
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
            [['text' => "❲ أضف بريدات ❳", 'callback_data' => "addmail"]], 
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    return false ;
				} 
				
	bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
➰ لائحه  البريدات المضافه
        *
        $sm
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["mode"] = $data;
X($h, $FileName);
return false ;
	}
	
	if($data == "delmail") {
		if(!$h["mails"]) {
				bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
🔃 احم! يبدو انك لم تقم باضافه بريدات من قبل
        *
   
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
            [['text' => "❲ أضف بريدات ❳", 'callback_data' => "addmail"]], 
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    return false ;
				} 
		$email= count($h["mails"]) ;
		bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        ❗ هل انت متأكد من حذف العدد ($email) من القائمه؟ 
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "نعم بالتأكيد ✅", 'callback_data' => "yesDel"]],
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["mode"] = $data;
X($h, $FileName);
return false ;
		} 
		
		if($data == "yesDel") {
			if($h["mode"] != "delmail" ) {
				bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
تم بالنجاح تاكيد وحذف ($email) ايميلات من القائمه ✔️
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
				return false ;
				} 
				$email= count($h["mails"]) ;
				bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
تم بالنجاح تاكيد وحذف ($email) ايميلات من القائمه ✔️
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["mode"] = $data;
    unset($h["mails"]) ;
X($h, $FileName);
return false ;
				} 
		
		
		
		
	if($h["mode"] == "addmail"){
		if(preg_match("/@/",$text)) { 
			$email= count($h["mails"])+1;
			if(in_array($text, $h["mails"])) {
				bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        
⛔ يبدو ان الايميل [$text] تم اضافته الي القائمه من قبل
        
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    
    return false ;
				} 
			bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
~ تم الحفظ والاضافه ✅
الاميل  : *[$text] 
*~ عدد الاميلات الحالي : $email*
        
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
    ]);
    $h["mails"][] = $text ;
			
				
		unset($h["mode"]);
X($h, $FileName);

		} else {
				$c=bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
       تأكد من ارسال الاميل بشكل صحيح ✔️
       تم الغاء العمليه بنجاح
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
    ]);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
        اهلا بك في بوت ارسال الرسائل الإلكترونية التلقائي 
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $c->result->message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ أضف بريدات ❳", 'callback_data' => "addmail"], ['text' => "❲ حذف البريدات ❳", 'callback_data' => "delmail"]],
                [['text' => "❲ عرض البريدات المضافه ❳", 'callback_data' => "viewmails"]],
                [['text' => "❲ ارسال رساله ❳", 'callback_data' => "sendms"]],
            ]
        ])
    ]);
    unset($h["mode"]);
X($h, $FileName);
   }
  
 }
//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @T_0_M0 
//قناه المطور @izeoe
// تخمط بدون متذكر المصدر تنهان
if($data == "sendms") {
	bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id, 
        'text' => "
        *
ارسلي البريد التي ترسل له رساله :
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["mode"] = $data ;
X($h, $FileName);
return false ;
	}
	
	if($h["mode"] == "sendms"){
	if(preg_match("/@/",$text)) {
		bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
ارسل لي الموضوع :
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["to"] = $text ;
    $h["mode"] = "s2" ;
X($h, $FileName);
return false ;
		}else{
			bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
❗ بريد خاطء يرجي التأكد 
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    return false ;
			} 
		}
		
		if($h["mode"] == "s2"){
			if($text) {
				bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
ارسل لي الرساله الإلكترونية :
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["sub"] = $text ;
    $h["mode"] = "s3" ;
X($h, $FileName);
return false ;
				} 
			}
			
			if($h["mode"] == "s3"){
			if($text) {
				bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
كم مره تريد ارسال هذه الرساله :
        *
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    $h["msg"] = $text ;
    $h["mode"] = "s4" ;
X($h, $FileName);
return false ;
				} 
			}
			
			if($h["mode"] == "s4"){
			if(is_numeric($text)) {
				$mail = $h["to"];
				$cou = count($h["mails"]);
				$sub = $h["sub"] ;
				$msg = $h["msg"];
				$v = rand(123456789,987654321);
				$h["codes"][$v] = $mail. "(?=?=?)". $text . "(?=?=?)". $sub. "(?=?=?)". $msg. "(?=?=?)". $text;
				bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
سيتم ارسال الرساله الي : $mail
عدد المرات التي سيتم ارسالها من كل حساب : *$text*
عدد الحسابات المضافه : *$cou*

موضوعها : $sub

الرساله : $msg
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ الغاء العمليه 🚫 ❳", 'callback_data' => "backi"], ['text' => "❲ تأكيد وارسال ✅ ❳", 'callback_data' => "yesme_$v"]],
            ]
        ])
    ]);
    $h["msgs"] = $text ;
    $h["mode"] = "s5" ;
X($h, $FileName);
return false ;
				} else {
					bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
برجاء ارسال الارقام فقط 👍
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "❲ رجوع ❳", 'callback_data' => "backi"]],
            ]
        ])
    ]);
    return false ;
					} 
			}
			
			if(preg_match("/yesme_/", $data)) {
				$v = explode("yesme_", $data)[1];
				 
				$h = explode("(?=?=?)", $h["codes"][$v]) ;
				$mail = $h[0];
				$cou = count($h["mails"]);
				$sub = $h[2];
				$msg = $h[3];
				$msgs = $h[1];
				bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
        *
برجاء الانتضار 🔃
*

سيتم ارسال الرساله الي : $mail
عدد المرات التي سيتم ارسالها من كل حساب : *$msgs*
عدد الحسابات المضافه : *$cou*

موضوعها : $sub

الرساله : $msg
        ",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
            'reply_to_message_id' => $message_id,
    ]);
    $h = json_decode(file_get_contents($FileName), 1);
    $vf = 0;
    for($i=0;$i <= count($h["mails"]) ;$i++){
    	
    $vf +=1;
    	for($i=0;$i <= $msgs;$i++){
        $to_email = $mail;
    $subject = $sub;
    $message = $msg;
    $headers = "From: ". $h["mails"][$vf];
    if (mail($to_email, $subject, $message, $headers)) {
        echo "تم إرسال الرسالة بنجاح";
    } else {
        echo "حدث خطأ أثناء محاولة إرسال الرسالة";
    }
}
} 
				} 

//تم تطوير ملف البوت واضافه لوحه ادمن وترتيبه + الملف شغال وبدون مشاكل
//معرف المطور البوت @T_0_M0 
//قناه المطور @izeoe
// تخمط بدون متذكر المصدر تنهان