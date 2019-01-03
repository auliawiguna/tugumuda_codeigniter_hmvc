<?php
function timediff($firstTime,$lastTime) {
    //selisih waktu/jam dalam detik
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);
    if($lastTime < $firstTime) {
        $lastTime += 24 * 60 * 60;
    }
    $timeDiff=$lastTime-$firstTime;
    return $timeDiff;
}

function clearWhitespaces($string) {
    return trim(preg_replace('/\s+/s', " ", $string));
}

function htmlValue($string) {
    return
        str_replace('"', "&quot;",
        str_replace("'", '&#39;',
        str_replace('<', '&lt;',
        str_replace('&', "&amp;",
    $string))));
}

function jsValue($string) {
    return
        preg_replace('/\r?\n/', "\\n",
        str_replace('"', "\\\"",
        str_replace("'", "\\'",
        str_replace("\\", "\\\\",
    $string))));
}

function xmlData($string, $cdata=false) {
    $string = str_replace("]]>", "]]]]><![CDATA[>", $string);
    if (!$cdata)
        $string = "<![CDATA[$string]]>";
    return $string;
}


// function compressCSS($code) {
//     $code = self::clearWhitespaces($code);
//     $code = preg_replace('/ ?\{ ?/', "{", $code);
//     $code = preg_replace('/ ?\} ?/', "}", $code);
//     $code = preg_replace('/ ?\; ?/', ";", $code);
//     $code = preg_replace('/ ?\> ?/', ">", $code);
//     $code = preg_replace('/ ?\, ?/', ",", $code);
//     $code = preg_replace('/ ?\: ?/', ":", $code);
//     $code = str_replace(";}", "}", $code);
//     return $code;
// }

function uang($nominal = ''){
    if ($nominal == ''){
        return '';
    }
    else{
        return '&nbsp;'.@number_format($nominal,0,',','.');
    }
}

function get_duplicate_array( $array ) {
    return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
}

function remove_letter($str =''){
    return preg_replace("/[^0-9,.]/", "", $str);
}

function debug($s='',$die=true){
    echo '<pre>';
    print_r($s);
    echo '</pre>';
    if($die == true){
        die();
    }
}


function jam_tabrakan($s1='',$e1='',$s2='',$e2=''){
    if(
            ($s1 == $s2 || $e1 == $e2) ||
            ($s1 <= $s2 && $e1 <= $e2 && $e1 >= $s2) ||
//            ($s1 >= $s2 && $e1 >= $e2 && $s1 <= $e2) ||
            ($s1 >= $s2 && $e1 >= $e2 && $s1 < $e2) ||
            ($s1>=$s2 && $e1<=$e2) ||
            ($s1<=$s2 && $e1>=$e2)
            ){
//        if(($s1 == $s2 || $e1 == $e2)){
//            echo 'Kondisi 1<br>';
//        }
//        if($s1 <= $s2 && $e1 <= $e2 && $e1 >= $s2){
//            echo 'Kondisi 2<br>';
//        }
//        if($s1 >= $s2 && $e1 >= $e2 && $s1 < $e2){
//            echo 'Mulai 1 = '.$s1.'<br>';
//            echo 'Selesai 1 = '.$e1.'<br>';
//            echo 'Mulai 2 = '.$s2.'<br>';
//            echo 'Selesai 2 = '.$e2.'<br>';
//            echo 'Kondisi 3<br>';
//        }
//        if($s1>=$s2 && $e1<=$e2){
//            echo 'Kondisi 4<br>';
//        }
//        if($s1<=$s2 && $e1>=$e2){
//            echo 'Kondisi 5<br>';
//        }
        return true;
            }else{
        return false;
            }
//    if(
//            ($s1 == $s2 || $e1 == $e2) ||
//            ($s1 <= $s2 && $e1 <= $e2 && $e1 >= $s2) ||
//            ($s1 >= $s2 && $e1 >= $e2 && $s1 <= $e2) ||
//            ($s1>=$s2 && $e1<=$e2) ||
//            ($s1<=$s2 && $e1>=$e2)
//            ){
//        return true;
//            }else{
//        return false;
//            }
}



function rangesNotOverlapClosed($start_time1,$end_time1,$start_time2,$end_time2){
  $utc = new DateTimeZone('UTC');

  $start1 = new DateTime($start_time1,$utc);
  $end1 = new DateTime($end_time1,$utc);
  if($end1 < $start1)
    throw new Exception('Range is negative.');

  $start2 = new DateTime($start_time2,$utc);
  $end2 = new DateTime($end_time2,$utc);
  if($end2 < $start2)
    throw new Exception('Range is negative.');
  return ($end1 < $start2) || ($end2 < $start1);
}

function rangesNotOverlapOpen($start_time1,$end_time1,$start_time2,$end_time2)
{
  $utc = new DateTimeZone('UTC');

  $start1 = new DateTime($start_time1,$utc);
  $end1 = new DateTime($end_time1,$utc);
  if($end1 < $start1)
    throw new Exception('Range is negative.');

  $start2 = new DateTime($start_time2,$utc);
  $end2 = new DateTime($end_time2,$utc);
  if($end2 < $start2)
    throw new Exception('Range is negative.');

  return ($end1 <= $start2) || ($end2 <= $start1);
}



function spasi($rekursive = 1){
    for($a=1 ; $a <= $rekursive ; $a++){
        echo '&nbsp;';
    }
}

function get_client_ip() {
	$ipaddress = '';
        if($_SERVER['REMOTE_ADDR']){
		$ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
		$ipaddress = 'UNKNOWN';
        }

	return $ipaddress;
}

    function formatTanggalPanjang($tanggal) {
        if(substr($tanggal, 0,9) != '00-00-000' || substr($tanggal, 0,9) != ''){
            $aBulan = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            list($thn,$bln,$tgl)=explode("-",$tanggal);
            $bln = (($bln >0 ) && ($bln < 10))? substr($bln,1,1): $bln ;
            return $tgl." ".$aBulan[$bln]." ".$thn;
        }else{
            return '';
        }
    }

    function formatBulanTahun($tanggal) {
        $aBulan = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        list($thn,$bln,$tgl)=explode("-",$tanggal);
        $bln = (($bln >0 ) && ($bln < 10))? substr($bln,1,1): $bln ;
        return $aBulan[$bln]." ".$thn;
    }

function tanggal($date = 1){
    if(substr($date, 0,9) != '00-00-000' || substr($date, 0,9) != '00/00/000' || substr($date, 0,9) != '' || substr($date, 0,9) != NULL ){
        date_default_timezone_set('Asia/Jakarta'); // your reference timezone here
    //    $date = date('Y-m-d', strtotime($date)); // ubah sesuai format penanggalan standart
        $date = date('Y-m-j', strtotime($date)); // ubah sesuai format penanggalan standart
        if($date != '1970-01-01' && $date != '1970-01-1'){
//            echo $date.'<br>';
            $bulan = array ('01'=>'Januari', // array bulan konversi
                    '02'=>'Februari',
                    '03'=>'Maret',
                    '04'=>'April',
                    '05'=>'Mei',
                    '06'=>'Juni',
                    '07'=>'Juli',
                    '08'=>'Agustus',
                    '09'=>'September',
                    '10'=>'Oktober',
                    '11'=>'November',
                    '12'=>'Desember'
            );
            $date = explode ('-',$date); // ubah string menjadi array dengan paramere '-'

            return @$date[2] . ' ' . @$bulan[$date[1]] . ' ' . @$date[0]; // hasil yang di kembalikan}
        }else{
            return '';
        }

    }else{
        return '';
    }
}

function romawi($n = '1'){
    $hasil = '';
    $iromawi = array('','I','II','III','IV','V','VI','VII','VIII','IX','X',
        20=>'XX',30=>'XXX',40=>'XL',50=>'L',60=>'LX',70=>'LXX',80=>'LXXX',
        90=>'XC',100=>'C',200=>'CC',300=>'CCC',400=>'CD',500=>'D',
        600=>'DC',700=>'DCC',800=>'DCCC',900=>'CM',1000=>'M',
        2000=>'MM',3000=>'MMM');

    if(array_key_exists($n,$iromawi)){
        $hasil = $iromawi[$n];
    }elseif($n >= 11 && $n <= 99){
        $i = $n % 10;
        $hasil = $iromawi[$n-$i] . Romawi($n % 10);
    }elseif($n >= 101 && $n <= 999){
        $i = $n % 100;
        $hasil = $iromawi[$n-$i] . Romawi($n % 100);
    }else{
        $i = $n % 1000;
        $hasil = $iromawi[$n-$i] . Romawi($n % 1000);
    }
    return $hasil;
}

function combo_jnskelamin($id ='',$selected=""){
    $h = "<select id='$id' name='$id' style='width:100%'>";
    $h .= '<option value="">Pilih Jenis Kelamin</option>';
    $h .= '<option '.(($selected == '1')?'selected':'').' value="1">Laki-laki</option>';
    $h .= '<option '.(($selected == '2')?'selected':'').' value="2">Perempuan</option>';
    $h .= '</select>';
    return $h;
}


function select_hari($id = 0,$selected=''){
    $hari = array("-", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu","Minggu","All Day");
    return Form::select($id,$hari,$selected,array('style' => 'width:100%'));
}

function array_hari($id = 0,$selected=''){
    $hari = array("-", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu","Minggu","All Day");
    return $hari;
}

function date_picker($id = 'asa',$value=""){
    return '<script>'
    .'$(document).ready(function(){'
    .'$(".tgl").datetimepicker({format: "YYYY-MM-DD"});'
    .'})</script>'
    .'<input type="text" class="form-control tgl" value="'.$value.'" id="'.$id.'" name="'.$id.'"  placeholder="Masukkan Tanggal">';
}

function tanggal_indonesia(){
    $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
//    $cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y");
    $cetak_date = date("j ") . $bulan[(int)date('m')] . date(" Y");
    return $cetak_date ;
}

function sekarang(){
    return date("Y-m-d H:i:s");
}


function modal($sempit = false,$name = 'modal2',$body = 'Modal2',$minus=false){
    $class = ($sempit == false)?'modal-dialog-wide':'modal-dialog';
    $js = '<script>var duplicateChk = {};'
            .'$("div#modal2[class]").each (function (a) {'
            .'if (duplicateChk.hasOwnProperty(this.class)) {'
            .'alert("kembar");$(this).remove();'
            .'} else { duplicateChk[this.class] = "true";}});</script>';

    $min = ($minus == true)?'':'';
    $html =  '<div class="modal fade" id="'.$name.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="'.$class.'">
        <div class="modal-content" id="wadah_modal">
        <div class="modal-header bg-primary">
        <button onclick="claravel_modal_close('."'$name'".')" type="button" aria-hidden="true" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-remove" ></i></button>
            '.$min.'
        <h4 class="modal-title"><b id="judulmodal"></b></h4>
      </div>
      <div class="modal-body">
        <div id="konten'.$body.'"></div>
      </div>
      <div class="modal-footer">
        <div id="footermodal"></div>
      </div>
    </div>
  </div>
</div>';
	return $html;
}

function catat_log($aksi = '',$modul=''){
    $simpan = array(
        'aksi' => $aksi,
        'module' => $modul,
        'user' => \Session::get('user_id'),
        'url' => \Request::url(),
        'waktu' => date("Y-m-d H:i:s")
    );
    $save = \DB::table('application_log')->insert($simpan);
}

function header_dokumen(){
    return '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap.css" />'.
            '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap-theme.css" />'.
            '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap-icons.css" />';
}

function hari($hari){
    switch ($hari){
        case '0' :
            return '';
            break;
        case '1' :
            return 'Senin';
            break;
        case '2' :
            return 'Selasa';
            break;
        case '3' :
            return 'Rabu';
            break;
        case '4' :
            return 'Kamis';
            break;
        case '5' :
            return "Jum'at";
            break;
        case '6' :
            return 'Sabtu';
            break;
        case '7' :
            return 'Minggu';
            break;
    }
}

function konversi_hari($hari){
    $hari = date("l", strtotime($hari));
        switch ($hari){
        case 'Monday' :
            return 'Senin';
            break;
        case 'Thuesday' :
            return 'Selasa';
            break;
        case 'Wednesday' :
            return 'Rabu';
            break;
        case 'Thursday' :
            return 'Kamis';
            break;
        case 'Friday' :
            return "Jum'at";
            break;
        case 'Saturday' :
            return 'Sabtu';
            break;
        case 'Sunday' :
            return 'Minggu';
            break;
    }
};

function cekLogin(){
    $user = \Session::get('user_id');
    $role = \Session::get('role_id');
    return (!$user || !$role)?false:TRUE;
    //if (!$user || !$role){die('Invalid Access :: You must sign in first !!<br><br><i>With Love :: Developer</i>');}
}

function cekAjax(){
    if( ! \Request::ajax()) {
        $request_url = urlencode(\Request::path());
    
        \App::abort(302, '', ['Location' => url('beranda?tab='.$request_url)]);
        // header('Location: ' . url('home?tab='.$request_url));
        // die();
    }
    // if (!\Request::ajax()){
	// 	die('
	// 	<script src="'.asset('packages/tugumuda/plugins/jQuery/jquery-1.11.0.min.js').'"></script>
	// 	<script src="'.asset('packages/tugumuda/js/ajax-loader.js').'"></script>
	// 	Invalid URL Request<br><br><i>With Love :: Developer</i>');
	// }
}

function get_role(){
    return \Session::get('role_id');
}

function user_id(){
    return \Session::get('user_id');
}

//START CREATED BY WIGUNA ON 16 MARET

function inputWarna($id='',$selected=""){
    $a1 = ($selected == 'bg-color-blue')?' selected ':' ';
    $a2 = ($selected == 'bg-color-blueDark')?' selected ':' ';
    $a3 = ($selected == 'bg-color-darken')?' selected ':' ';
    $a4 = ($selected == 'bg-color-green')?' selected ':' ';
    $a5 = ($selected == 'bg-color-greenDark')?' selected ':' ';
    $a6 = ($selected == 'bg-color-orange')?' selected ':' ';
    $a7 = ($selected == 'bg-color-pink')?' selected ':' ';
    $a8 = ($selected == 'bg-color-purple')?' selected ':' ';
    $a9 = ($selected == 'bg-color-yellow')?' selected ':' ';
    $a10 = ($selected == 'bg-color-red')?' selected ':' ';
    $html = '<select id="'.$id.'" name="'.$id.'">
            <option '.$a1.'value="bg-color-blue">Biru</option>
            <option '.$a2.'value="bg-color-blueDark">Biru Gelap</option>
            <option '.$a3.'value="bg-color-darken">Gelap</option>
            <option '.$a4.'value="bg-color-green">Hijau</option>
            <option '.$a5.'value="bg-color-greenDark">Hijau Gelap</option>
            <option '.$a6.'value="bg-color-orange">Jingga</option>
            <option '.$a7.'value="bg-color-pink">Merah Muda</option>
            <option '.$a8.'value="bg-color-purple">Ungu</option>
            <option '.$a9.'value="bg-color-red">Merah</option>
            <option '.$a10.'value="bg-color-yellow">Kuning</option>
            </select>';
    return $html;
}


function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}

function getBaseURL($with_http = false){
    /*
    $url = \Request::url();
    //    $url = str_replace('http://')
    $arrurl = explode('/',$url);
    if ($with_http == false){
        return $arrurl[2];
    }
    else{
        return (isSecure())?'https://'.$arrurl[2].'/':'http://'.$arrurl[2].'/';
        //return 'https://'.$arrurl[2].'/';
    }
    */
    return url();
}

function ambil_angka($a){
    return preg_replace('/[^\p{L}\p{N}\s]/u', '', $a);
}

function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'shortname'      => $ub,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}


function uang_akhir($nominal = ''){
    if ($nominal == ''){
        return 0;
    }
    else{
        if($nominal < 0){
            return '('.@number_format( ($nominal) * (-1) ,0,',','.').')';
        }else{
            return @number_format($nominal,0,',','.');
        }
    }
}

function is_url_exist($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

function number_format_persen($nominal,$desimal = 0){
    $desimal = (is_integer($nominal))?0:2;
    if(false === $nominal){
        return 100;
    }
    if ($nominal == ''){
        return 0;
    }
    else{
        if($nominal < 0){
            return '('.  @number_format($nominal * (-1),$desimal, "," , ".").')';
//            return '('.  number_format($nominal * (-1),2, "," , ".").')';
        }else{
//            return number_format($nominal,2, "," , ".");
            return @number_format($nominal,$desimal, "," , ".");
        }
    }
}


function td($array=array(),$tr = false){
    $t = ($tr)?'<tr>':'';
    foreach($array as $a){
        $t .= '<td>'.$a.'</td>';
    }
    $t .= ($tr)?'</tr>':'';
    return $t;
}

function th($array=array(),$tr = false){
    $t = ($tr)?'<tr>':'';
    foreach($array as $a){
        $t .= '<th>'.$a.'</th>';
    }
    $t .= ($tr)?'</tr>':'';
    return $t;
}

function array_msort($array, $cols)
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
    }
    $eval = 'array_multisort(';
    foreach ($cols as $col => $order) {
        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
    }
    $eval = substr($eval,0,-1).');';
    eval($eval);
    $ret = array();
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k,1);
            if (!isset($ret[$k])) $ret[$k] = $array[$k];
            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;

}


function btnPrint($id = false,$caption='',$lokasi = ""){
    return "<a target='_blank' id='".$id."' type='submit' class='btn btn-success' href=".$lokasi."><span class='glyphicon glyphicon-print'></span>"
            .$caption
            ."</a>";
}

function getBojo($bojo_name = ''){
    
}

function btnCreate($caption = 'Buat Baru'){
if (\PermissionsLibrary::canAdd()){
    //return "<a id='".$id."' href=\"/".\Request::path().'/create'."\" class=\"btn btn-primary ".\Config::get('claravel::ajax')."\"><span class=\"glyphicon glyphicon-plus-sign\"></span>$caption</a>";
    return "<a id='buat' href='".url().'/'.\Request::path().'/create'."' class='btn btn-primary".\Config::get('claravel::ajax')."'><i class='fa fa-plus-square'></i> $caption</a>";
}
}

function btnCancel($caption = 'Batalkan'){
    $route = pathinfo(\Request::path(), PATHINFO_BASENAME);
    $uri  = str_replace($route, '', \Request::path());
    //return "<a id='".$id."'href=\"/".$uri."\" class=\"btn btn-warning ".\Config::get('claravel::ajax')."\"><span class=\"glyphicon glyphicon-remove-circle\"></span>$caption</a>";
    return "<a id='batalkan' href='".url().'/'.substr($uri, 0,strlen($uri)-1)."' class='btn btn-warning ".\Config::get('claravel::ajax')."'><i class='fa fa-times-circle-o'></i> $caption</a>";
}

function btnCancelEdit(){
$route1 = pathinfo(\Request::path(), PATHINFO_BASENAME);
$route1  = str_replace($route1, '', \Request::path());
$route2 = pathinfo($route1, PATHINFO_BASENAME);
$uri  = str_replace($route2.'/', '', $route1);
return "<a id='batalkan' href=\"/".$uri."\" class=\"btn btn-warning ".\Config::get('claravel::ajax')."\"><i class='fa fa-times-circle-o'></i> Batalkan Edit</a>";
}

function btnSave($id = false, $caption = 'Simpan'){
    return "<button id='".$id."' type=\"submit\" class=\"btn btn-success\"><i class='fa fa-floppy-o'></i> $caption</button>";
} 

function btnDeleteAll($caption = 'Hapus yang ditandai'){
if (\PermissionsLibrary::canDel()){
    return "<button class='btn btn-warning btn-sm' style='display:none' id='deleteall' type='submit'><i class='fa fa-times'></i> ".$caption."</button>";
}
} 

function btnDelete($recid = ''){
if (\PermissionsLibrary::canDel()){
    return "<a id='hapus' href=\"".url()."/".\Request::path().'/delete'."\" recid='".$recid."' class='text-danger'><i class='fa fa-times-circle'></i> Hapus</a>";
}
}

function btnEdit($recid=''){
if (\PermissionsLibrary::canEdit()){
    return "<a id='edit' href=\"".url()."/".\Request::path().'/edit'."\" recid='".$recid."' class='text-info'><i class='fa fa-pencil-square-o'></i> Edit</a>";
}
}

function btnReset($id=false,$class=''){
if (\PermissionsLibrary::canEdit()){
    return "<a id='".$id."' href=\"".url()."/".\Request::path().'/edit/'.$id."\" class='".$class."'><span class=\"glyphicon glyphicon-edit\"></span>Reset</a>";
}
}

function btnDownloadPDF($url=false){
    return "<a target='_blank' "
    . "href='".$url."' "
            . "class='btn btn-info'><span class='glyphicon glyphicon-print'></span>Cetak</a>";
}

function ckDelete($id){
if (\PermissionsLibrary::canDel()){
    return "<input type=\"checkbox\" class=\"checkme\" name=\"id[]\" value=\"".$id."\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Pilih untuk dihapus\">";
}
}

function satuan($inp){
switch ($inp){
case 1 : return 'satu'; break;
case 2 : return 'dua'; break;
case 3 : return 'tiga'; break;
case 4 : return 'empat'; break;
case 5 : return 'lima'; break;
case 6 : return 'enam'; break;
case 7 : return 'tujuh'; break;
case 8 : return 'delapan'; break;
case 9 : return 'sembilan'; break;
default : return ''; break;
}

}


function belasan($inp){
$proses = $inp; //substr($inp, -1);
if ($proses == '11'){
return "sebelas ";        
}else{
$proses = substr($proses,1,1);
return satuan($proses)."belas ";

}
}



function puluhan($inp){
$proses = $inp; //substr($inp, 0, -1);
if ($proses == 1){
return "sepuluh ";        
}
else if ($proses == 0){
return '';        
}
else{
return satuan($proses)."puluh ";        
}
}


function ratusan($inp){
$proses = $inp; //substr($inp, 0, -2);
if ($proses == 1){
return "seratus ";        
}
else if ($proses == 0){
return '';        
}
else{
return satuan($proses)." ratus ";   
}
}


function ribuan($inp, $tunggal = false){
$proses = $inp; //substr($inp, 0, -3);
if($tunggal == false){
if ($proses == 1){
    return "seribu ";        
}
else if ($proses == 0){
    return '';        
}
else{
    return satuan($proses)." ribu ";

}        
}
else{
if ($proses == 1){
    return "satu ribu ";        
}
else if ($proses == 0){
    return '';        
}
else{
    return satuan($proses)." ribu ";

}        

}
}


function jutaan($inp){
$proses = $inp;
if ($proses == 0){
return '';        
}
else{
return satuan($proses)." juta ";        
}
}


function milyaran($inp){
$proses = $inp; //substr($inp, 0, -9);
if ($proses == 0){
return '';        
}
else{
return satuan($proses)."milyar ";

}
}


function terbilang($rp){
$kata = "";
$rp = trim($rp);
if (strlen($rp) >= 10){
$angka = substr($rp, strlen($rp)-10, -9);
$kata = $kata.milyaran($angka);        
}
$tambahan = "";
if (strlen($rp) >= 9){
$angka = substr($rp, strlen($rp)-9, -8);
$kata = $kata.ratusan($angka);
if ($angka > 0) { 
    $tambahan = "juta ";             
}        
}
if (strlen($rp) >= 8){
$angka = substr($rp, strlen($rp)-8, -7);
$angka1 = substr($rp, strlen($rp)-7, -6);
if (($angka == 1) && ($angka1 > 0)){
    $angka = substr($rp, strlen($rp)-8, -6);
    $kata = $kata.belasan($angka)." juta ";            
}else{
    $angka = substr($rp, strlen($rp)-8, -7);
    $kata = $kata.puluhan($angka);
    if ($angka > 0) { 
        $tambahan = " juta ";                 
    }
    $angka = substr($rp, strlen($rp)-7, -6);
    $kata = $kata.jutaan($angka); //awalnya ribuan, dirubah jadi jutaan
    if ($angka == 0) { 
        $kata = $kata.$tambahan; 
    }            
}        
}
if (strlen($rp) == 7){
$angka = substr($rp, strlen($rp)-7, -6);
$kata = $kata.jutaan($angka);
if ($angka == 0) { 
    $kata = $kata.$tambahan;             
}        
}
$tambahan = "";
if (strlen($rp) >= 6){
$angka = substr($rp, strlen($rp)-6, -5);
$kata = $kata.ratusan($angka);
if ($angka > 0) { 
    $tambahan = " ribu ";             
}        
}
if (strlen($rp) >= 5){
$angka = substr($rp, strlen($rp)-5, -4);
$angka1 = substr($rp, strlen($rp)-4, -3);
if (($angka == 1) && ($angka1 > 0)){
    $angka = substr($rp, strlen($rp)-5, -3);
    $kata = $kata.belasan($angka)." ribu ";
}else{
    $angka = substr($rp, strlen($rp)-5, -4);
    $kata = $kata.puluhan($angka);
    if ($angka > 0) { 
        $tambahan = " ribu ";             
    }
    $angka = substr($rp, strlen($rp)-4, -3);
    $tunggal = ((substr($rp, strlen($rp)-5, -4) > 0) && $angka==1)?true:false;
    $kata = $kata.ribuan($angka,$tunggal);
    if ($angka == 0) { 
        $kata = $kata.$tambahan;             
    }        
}
}
if (strlen($rp) == 4){
$angka = substr($rp, strlen($rp)-4, -3);
$kata = $kata.ribuan($angka);
if ($angka == 0) { 
    $kata = $kata.$tambahan;             
}        
}
if (strlen($rp) >= 3){
$angka = substr($rp, strlen($rp)-3, -2);
$kata = $kata.ratusan($angka);        
}
if (strlen($rp) >= 2){
$angka = substr($rp, strlen($rp)-2, -1);
$angka1 = substr($rp, strlen($rp)-1);
if (($angka == 1) && ($angka1 > 0))
{
$angka = substr($rp, strlen($rp)-2);
//echo " belasan".($angka)." ";
$kata = $kata.belasan($angka);
}
else
{
//echo " puluhan".($angka)." ";
$kata = $kata.puluhan($angka);

$angka = substr($rp, strlen($rp)-1);
//echo " satuan".($angka)." ";
$kata = $kata.satuan($angka);
}
}
if (strlen($rp) == 1 && is_integer($rp)){
$angka = substr($rp, strlen($rp)-1);
$kata = $kata.satuan($angka);
}
if (strlen($rp) == 1 && !is_integer($rp)){
$kata = 'Nol';
}
if (strlen($rp) == 0){
$kata = 'Nol';
}
return $kata;
}



function terbilang2($x)
{
$abil = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
if ($x < 12)
return " " . $abil[$x];
elseif ($x < 20)
return terbilang($x - 10) . " Belas";
elseif ($x < 100)
return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
elseif ($x < 200)
return " Seratus" . terbilang($x - 100);
elseif ($x < 1000)
return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
elseif ($x < 2000)
return " Seribu" . terbilang($x - 1000);
elseif ($x < 1000000)
return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
elseif ($x < 1000000000)
return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
elseif ($x < 1000000000000)
return terbilang($x / 1000000000) . " Milyar" . terbilang($x % 1000000000);
elseif ($x < 1000000000000000)
return terbilang($x / 1000000000000) . " Triliyun" . terbilang($x % 1000000000000);

}

function url($u=''){
    return base_url($u);
}

function session($a=''){
    $ci =& get_instance();
    return $ci->session->userdata($a);
}