<?php

/*
Plugin Name: Site Layout Customizer
Plugin URI: 
Description: Easily customize your frontpage and other pages to look great
Version: 1.8
Author: wpcolor
*/



/**************************************************************************

Copyright (C) 2011-2012 1customize

email : info@1customize.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License
		
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  gnu.org/licenses

**************************************************************************/

$gvext = 0;
//external
if ($gvext == 1){
  @include_once('ext.php');
}

global $gvdisplayed;
$gvdisplayed = array();



global $gvoptions_0, $gvoptions_1, $gvoptions_2, $gvoptions_3, $gvoptions_4, $gvoptions_5, $gvoptions_6, $gvoptions_7, $gvoptions_8, $gvoptions_9, $gvoptions_10, $gvoptions_11, $gvoptions_12, $gvoptions_13, $gvoptions_14, $gvoptions_15, $gvoptions_16, $gvoptions_17, $gvoptions_18, $gvoptions_19, $gvoptions_20;
global $gvinit1, $gvinit2, $gvinit3, $gvinit4, $gvinit5, $gvinit6, $gvinit7, $gvinit8, $gvext;

$gvinit0 = array(
  'layoutspace' => '2', 'test' => '0' , 'duplicates' => '0', 'overimgh' => '2', 'period' => '1', 'maxcat' => '0', 'overimgh' => '2',
  'cssbg' => '0', 'namedate' => '1', 'adminw' => '700', 'postspace' => '1',
   'imginsert' => '1', 'donated' => '0', 'cssurl' => '', 'sort' => '0'
);
$gvinit1 = array(
  'posts' => '1', 'cat1' => '0',  'cat2' => '0',
  'areaimage' => '2', 'areatitle' => '3', 'areaexcerpt' => '3', 'areacat' => '0', 'areatag' => '0', 'areaauthor' => '0', 'areabio' => '0',  'areabg' => '2', 
  'posimage' => '1', 'postitle' => '1', 'posexcerpt' => '2', 'poscat' => '0', 'postag' => '0', 'posauthor' => '0', 'posbio' => '0',  
  'excerptlength' => '180', 'size' => 'thumbnail', 'imgw' => '', 'imgh' => '100', 'embed' => '0', 'dual' => '0', 'title' => '', 'cssbg' => '1'
);

$gvoptions_0 = get_option('slc_options_0');
$gvoptions_1 = get_option('slc_options_1');
$gvoptions_2 = get_option('slc_options_2');
$gvoptions_3 = get_option('slc_options_3');
$gvoptions_4 = get_option('slc_options_4');
$gvoptions_5 = get_option('slc_options_5');
$gvoptions_6 = get_option('slc_options_6');
$gvoptions_7 = get_option('slc_options_7');
$gvoptions_8 = get_option('slc_options_8');
$gvoptions_9 = get_option('slc_options_9');
$gvoptions_10 = get_option('slc_options_10');
$gvoptions_11 = get_option('slc_options_11');
$gvoptions_12 = get_option('slc_options_12');
$gvoptions_13 = get_option('slc_options_13');
$gvoptions_14 = get_option('slc_options_14');
$gvoptions_15 = get_option('slc_options_15');
$gvoptions_16 = get_option('slc_options_16');
$gvoptions_17 = get_option('slc_options_17');
$gvoptions_18 = get_option('slc_options_18');
$gvoptions_19 = get_option('slc_options_19');
$gvoptions_20 = get_option('slc_options_20');

$d = plugins_url('style.css', __FILE__);
wp_register_style('slc-css', $d, array(), '1.0.0', 'all');
wp_enqueue_style('slc-css');

$v = slc_val('cssurl',0);
if (strlen($v) > 1){
   $v2 = site_url().'/'.$v;
   wp_register_style('slcb-css', $v2, array(), '1.0.0', 'all');
   wp_enqueue_style('slcb-css');
}



function slc_delete_options(){
  delete_option('slc_options_0');
  delete_option('slc_options_1');
  delete_option('slc_options_2');
  delete_option('slc_options_3');
  delete_option('slc_options_4');
  delete_option('slc_options_5');
  delete_option('slc_options_6');
  delete_option('slc_options_7');
  delete_option('slc_options_8');
  delete_option('slc_options_9');
  delete_option('slc_options_10');
  delete_option('slc_options_11');
  delete_option('slc_options_12');
  delete_option('slc_options_13');
  delete_option('slc_options_14');
  delete_option('slc_options_15');
  delete_option('slc_options_16');
  delete_option('slc_options_17');
  delete_option('slc_options_18');
  delete_option('slc_options_19');
  delete_option('slc_options_20');
}

function slc_val($a,$b){
  global $gvinit0, $gvinit1, $gvinit2, $gvinit3, $gvinit4, $gvinit5, $gvinit6, $gvinit7, $gvinit8, $gvinit9, $gvinit10, $gvinit11, $gvinit12, $gvinit13, $gvinit14, $gvinit15, $gvinit16, $gvinit17, $gvinit18, $gvinit19, $gvinit20, $gvext;
  global $gvoptions_0, $gvoptions_1, $gvoptions_2, $gvoptions_3, $gvoptions_4, $gvoptions_5, $gvoptions_6, $gvoptions_7, $gvoptions_8, $gvoptions_9, $gvoptions_10, $gvoptions_11, $gvoptions_12, $gvoptions_13, $gvoptions_14, $gvoptions_15, $gvoptions_16, $gvoptions_17, $gvoptions_18, $gvoptions_19, $gvoptions_20, $glsc;

  if ($b == 0){
     $v = $gvoptions_0[$a];
     if (!isset($gvoptions_0[$a])){
       $v = $gvinit0[$a];
     }
  }
  if ($b == 1){
     $v = $gvoptions_1[$a];
     if (!isset($gvoptions_1[$a])){
       $v = $gvinit1[$a];
     }
  }
  if ($b == 2){
     $v = $gvoptions_2[$a];
     if (!isset($gvoptions_2[$a])){
       $v = $gvinit2[$a];
     }
  }
  if ($b == 3){
     $v = $gvoptions_3[$a];
     if (!isset($gvoptions_3[$a])){
       $v = $gvinit3[$a];
     }
  }
  if ($b == 4){
     $v = $gvoptions_4[$a];
     if (!isset($gvoptions_4[$a])){
       $v = $gvinit4[$a];
     }
  }
  if ($b == 5){
     $v = $gvoptions_5[$a];
     if (!isset($gvoptions_5[$a])){
       $v = $gvinit5[$a];
     }
  }
  if ($b == 6){
     $v = $gvoptions_6[$a];
     if (!isset($gvoptions_6[$a])){
       $v = $gvinit6[$a];
     }
  }
  if ($b == 7){
     $v = $gvoptions_7[$a];
     if (!isset($gvoptions_7[$a])){
       $v = $gvinit7[$a];
     }
  }
  if ($b == 8){
     $v = $gvoptions_8[$a];
     if (!isset($gvoptions_8[$a])){
       $v = $gvinit8[$a];
     }
  }
  if ($b == 9){
     $v = $gvoptions_9[$a];
  }
  if ($b == 10){
     $v = $gvoptions_10[$a];
  }
  if ($b == 11){
     $v = $gvoptions_11[$a];
  }
  if ($b == 12){
     $v = $gvoptions_12[$a];
  }
  if ($b == 13){
     $v = $gvoptions_13[$a];
  }
  if ($b == 14){
     $v = $gvoptions_14[$a];
  }
  if ($b == 15){
     $v = $gvoptions_15[$a];
  }
  if ($b == 16){
     $v = $gvoptions_16[$a];
  }
  if ($b == 17){
     $v = $gvoptions_17[$a];
  }
  if ($b == 18){
     $v = $gvoptions_18[$a];
  }
  if ($b == 19){
     $v = $gvoptions_19[$a];
  }
  if ($b == 20){
     $v = $gvoptions_20[$a];
  }
  if (!isset($v)){
     $v = $gvinit1[$a];
  }
  

  if ($glsc[$a] <> ''){
     $v = $glsc[$a];
  }

  return $v;
}



global $gvpl;
$gvpl = plugins_url( '' , __FILE__ ).'/';
function ilc_admin_tabs( $current = 'homepage' ) {
    $tabs = array( '1' => 'Layout 1', '2' => 'Layout 2','3' => 'Layout 3','4' => 'Layout 4','0' => 'Main Options');
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        global $gvpl;
        $i = '';
  	global $gvext;
	if ($tab <= 4 or $gvext == 1){
          echo '<a class="nav-tab'.$class.'" href="?page=slcplugin&tab='.$tab.'">'.$name.$i.'</a>';
	}
}
    echo '</h2>';
}




add_action('admin_menu', 'slc_admin_add_page');


function slc_admin_add_page() {
  add_menu_page('Site Layout Customizer Options', 'Site Layout Customizer', 'manage_options', 'slcplugin', 'slc_options_page');
}


function slc_options_page() {
  global $gvlayout;

  ilc_admin_tabs($gvlayout);

  echo '<div><h2>Site Layout Customizer Options</h2>';
  echo '<form action="options.php" method="post">';

  //global $gvlayout;
  settings_fields('slc_options_'.$gvlayout); 
  do_settings_sections('slcplugin');

?>
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form></div>
<?php
}


// add the admin settings
add_action('admin_init', 'slc_admin_init');


function slc_admin_init(){
  global $gvlayout;
  $gvlayout = $_GET['tab'];
  if ($gvlayout ==  ''){
    $gvlayout = '1';
  }

  
  register_setting( 'slc_options_0', 'slc_options_0', 'slc_options_validate' );
  register_setting( 'slc_options_1', 'slc_options_1', 'slc_options_validate' );
  register_setting( 'slc_options_2', 'slc_options_2', 'slc_options_validate' );
  register_setting( 'slc_options_3', 'slc_options_3', 'slc_options_validate' );
  register_setting( 'slc_options_4', 'slc_options_4', 'slc_options_validate' );

 
  slc_layout_settings($gvlayout);


  if ($gvlayout == 0){
    add_settings_section('slc_main_section', 'Main Options', 'slc_section_text', 'slcplugin');
    add_settings_field('slc_path', 'CSS file url', 'slc_path', 'slcplugin', 'slc_main_section');
    add_settings_field('slc_showhr', 'Show space between layouts', 'slc_showhr', 'slcplugin', 'slc_main_section');
    add_settings_field('slc_test', 'Show layout number', 'slc_test', 'slcplugin', 'slc_main_section');
    add_settings_field('slc_admin', 'Layout Example Width', 'slc_admin', 'slcplugin', 'slc_main_section');
    add_settings_field('slc_dup', 'Allow duplicate posts', 'slc_dup', 'slcplugin', 'slc_main_section');
    
    add_settings_section('slc_main_section2', 'Layout Options', 'slc_section_text', 'slcplugin');
    add_settings_field('slc_ed', 'Shorten excerpts to closest period', 'slc_ed', 'slcplugin', 'slc_main_section2');
    add_settings_field('slc_sort', 'Sort articles by', 'slc_sort', 'slcplugin', 'slc_main_section2');

     
  }else{
  
    add_settings_section('slc_top_section', 'Layout '.$gvlayout, 'slc_top_text', 'slcplugin');
    add_settings_field('slc_posts', 'How many posts to show', 'slc_posts', 'slcplugin', 'slc_top_section');

    add_settings_section('slc_placement_section', 'Layout '.$gvlayout.' Placement', 'slc_placement_text', 'slcplugin');
    add_settings_field('show image', 'Image', 'slc_showimage', 'slcplugin', 'slc_placement_section');
    add_settings_field('show_title'.$gvlayout, 'Title', 'slc_showtitle', 'slcplugin', 'slc_placement_section');
    add_settings_field('show excerpt', 'Excerpt', 'slc_showexcerpt', 'slcplugin', 'slc_placement_section');
    add_settings_field('show categories', 'Categories', 'slc_showcategories', 'slcplugin', 'slc_placement_section');
    add_settings_field('show tags', 'Tags', 'slc_showtags', 'slcplugin', 'slc_placement_section');
    add_settings_field('show author', 'Author & Date', 'slc_showauthor', 'slcplugin', 'slc_placement_section');
    add_settings_field('show bio', 'Author Bio', 'slc_showbio', 'slcplugin', 'slc_placement_section');
    add_settings_field('Show background', 'Background Color', 'slc_background', 'slcplugin', 'slc_placement_section');

    add_settings_section('slc_img_section',  'Layout '.$gvlayout.' Image', 'slc_section_text', 'slcplugin');
    add_settings_field('slc_img1', 'Image Width', 'slc_img1', 'slcplugin', 'slc_img_section');
    add_settings_field('slc_img2', 'Image Height', 'slc_img2', 'slcplugin', 'slc_img_section');
    add_settings_field('slc_img3', 'Image Size', 'slc_img3', 'slcplugin', 'slc_img_section');
    add_settings_field('slc_img4', 'Embed image & the area it is in', 'slc_img4', 'slcplugin', 'slc_img_section');

    add_settings_section('slc_position_section',  'Layout '.$gvlayout.' General', 'slc_section_text', 'slcplugin');
    add_settings_field('slc_el', 'Length of excerpt <br>(how many characters to show)', 'slc_el', 'slcplugin', 'slc_position_section');
    add_settings_field('slc_dual', 'Show 2 columns of posts, side by side', 'slc_dual', 'slcplugin', 'slc_position_section');
    add_settings_field('slc_cssbgs', 'Background Color Effects', 'slc_cssbgs', 'slcplugin', 'slc_position_section');
    add_settings_field('slc_car1', 'Show posts only from category', 'slc_cat1', 'slcplugin', 'slc_position_section');
 
  }
}
function slc_layout_settings($b){
}
function slc_placement_text(){
   global $gvpl;
   echo '<img src="'.$gvpl.'areas.jpg" width="100" align="left" hspace="2">';
   echo 'Here you can change the placements of title and other elements.<br> There are 3 main areas (top, left, right) and 10 positions within each area <br>(1 is the highest 10 is the lowest) . For example to put the title in <br>the top of the left area, choose LEFT and 1<br>';
}
// validate our options
function slc_options_validate($input) {
  $newinput['adminw'] = min(max($input['adminw'],100),1000);
  $newinput['imgw'] = min(max($input['imgw'],0),3000);
  $newinput['imgh'] = min(max($input['imgh'],0),3000);
  $newinput['excerptlength'] = min(max($input['excerptlength'],0),100000);
  return $input;
}
function slc_section_text() {

}
function slc_info($t){
  global $gvpl;
  if ($t <> ''){
    return slctext('<i>'.$t.'</i>',11,'gray');
  }
}


function slc_top_text() {
  global $gvlayout, $slcmsg;
  $w = slc_val('adminw',0);
  if ($slcmsg <> ''){
    $tm .= slcbox($slcmsg,'#F0F3FC','black',$w.'px');
    $gvmsg = '';
  }
  
   $t .= 'When uploading an image to a post choose "set featured image"<br>';
  // $t .= 'Example (the latest posts)';
  $c = '[layout show="'.$gvlayout.'"]';
  $t .= 'To show this layout, paste this shortcode on a page or post:<br>'.$c;
  $t = slcbox($t,'#F0F3FC','black',$w.'px');
  
  $o =  slcshortcode(array('show' => $gvlayout));
    
  global $glimgw;
  if (!$glimgw > 0 and slc_val('areaimage',$gvlayout) > 0){
    $t .= slcbox('No image was found in one of the posts below','#F0F3FC','black',$w.'px');
  } 
  
  $o = slctableh($tm.$t.$e.'<br><br>'.$o,'','',$w.'px','','','slc-clear','','','slc-admin',$w.'px');

  echo $o;

}






function slc_showhr() {
  slc_selspace('layoutspace');
}
function slc_maxcat() {
  slc_str('maxcat','','');
}
function slc_layouts() {
  slc_sellayouts('layouts');
}
function slc_test() {
  slc_switch('test','','shows layout number in red text, not to use on live site');
}
function slc_posts_top() {
  slc_selposts('poststop');
}  
function slc_namedateb() {
  slc_namedate2('namedate');
}
function slc_ed() {
  slc_switch('period','','can make excerpt look better');
}
function slc_dup() {
  slc_switch('duplicates','',' default off, allow same post to show up more than once on a page');
}
function slc_admin() {
  slc_str('adminw','','The width in pixels of the example post in the admin layout section');
}
function slc_path() {
   $u = site_url();
   slc_str('cssurl',slctext($u.'/ ','15','black',0,1),'URL TO A CSS FILE, example: '.$u.'/mystyle.css. ',50);
   
   $v = slc_val('cssurl',0);
   $v2 = site_url().'/'.$v;
   if (strlen($v) > 1 and strpos($v2,'.css') > 0){
  
     if (@fopen($v2,"r")==true){
        echo slcbox('CSS File found!','#C6F5CF','black');
     }else{
         echo slcbox('CSS file not found');
     }
   
   }
     
   echo slcbox($a.'
<b>IMPORTANT!</b> - if you want to add your own css file and override the plugin css. To protect your css file from being overwritten from plugin updates you need to put it in a safe directory outside the plugin directory. Change the css file url to point to your css file. Make a backup of your css file. 
Read more on <a href="http://1customize.com" target="_blank">plugin home</a>.

  ');
}


function slcbox($a,$c="#F2E9ED",$c2='red',$w = '600px'){
   return '<p style=" background: '.$c.'; width: '.$w.'; padding: 6px; margin:4px; border:1px; color:'.$c2.';">'.$a.' </p>';
}



function slc_activate() {
  slc_switch('activate','',$i);
}
function slc_posts() {
  slc_selposts('posts','','');
}  
function slc_sort() {
  slc_selsort('sort','','');
}  




function slc_showimage() {
   slc_selareaimg('areaimage');
   slc_selpos('posimage');
}
function slc_showcategories() {   
   slc_selarea('areacat');
   slc_selpos('poscat');
}
function slc_showtags() {
   slc_selarea('areatag');
   slc_selpos('postag');
}
function slc_showauthor() {
   slc_selarea('areaauthor');
   slc_selpos('posauthor');
}
function slc_showexcerpt() {
   slc_selarea('areaexcerpt');
   slc_selpos('posexcerpt');
}
function slc_showtitle() {
   slc_selarea('areatitle');
   slc_selpos('postitle');
}
function slc_showbio() {
   slc_selarea('areabio');
   slc_selpos('posbio');
}
function slc_background() {
  slc_placementbg('areabg');
}
function slc_cat1() {
  slc_selcat('cat1');
}
function slc_cat2() {
  slc_selcat('cat2');
}



function slc_el() {
  slc_str('excerptlength','','0 = no limit');
} 
function slc_dual() {
   slc_switch('dual','','');
}
function slc_btitle() {
  slc_str('title','','leave blank for none',20);
}


function slc_img1() {
  slc_str('imgw','','In pixels. Leave blank to not set the width');
}
function slc_img2() {
  slc_str('imgh','','In pixels. Leave blank to not set the height');
}
function slc_img3() {
  slc_selimg('size','');
}
function slc_img4() {
  slc_switch('embed','','');
}
function slc_cssbgs() {
   //slc_switch('cssbg','','');
  slc_idbg('cssbg','','');
}






function slc_selcat($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';
  
  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">';
  
  echo '<option '.$sel[0].'  value="0"        >ALL </option>';
  
  $cats = get_categories('orderby=count&order=DESC'); 
  foreach ($cats as $cat){
     $i = $cat->term_id;
     $n = $cat->cat_name;
     echo '<option '.$sel[$i].'  value="'.$i.'"        >'.$n.'</option>';
  }
  
  echo '</select><i>'.slc_info($t2).'</i>';
}
function slc_selsort($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[0].'  value="0"        >Post Added Date (default)</option>
    <option '.$sel[1].'  value="1"      >Post Edited Date</option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_idbg($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[0].'  value="0"        >NONE</option>
    <option '.$sel[1].'  value="1"      >EFFECT 1</option>
    <option '.$sel[2].'  value="2"      >EFFECT 2</option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_placementbg($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[0].'  value="0"        >Hide</option>
    <option '.$sel[2].'  value="2"      >LEFT</option>
    <option '.$sel[3].'  value="3"      >RIGHT</option>
    <option '.$sel[4].'  value="4"      >ALL AREAS</option>
    <option '.$sel[5].'  value="5"      >LAYOUT</option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_selarea($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[0].'  value="0"        >Hide</option>
    <option '.$sel[1].'  value="1"      >TOP</option>
    <option '.$sel[2].'  value="2"      >LEFT</option>
    <option '.$sel[3].'  value="3"      >RIGHT</option>
    <option '.$sel[10].'  value="10"      >On image</option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_selareaimg($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[0].'  value="0"        >Hide</option>
    <option '.$sel[2].'  value="2"      >LEFT</option>
    <option '.$sel[3].'  value="3"      >RIGHT</option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_selposts($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo '<select  name="'.$b.'">
    <option '.$sel[1].'  value="1">1</option>
    <option '.$sel[2].'  value="2">2</option>
    <option '.$sel[3].'  value="3">3</option>
    <option '.$sel[4].'  value="4">4</option>
    <option '.$sel[5].'  value="5">5</option>
    <option '.$sel[6].'  value="6">6</option>
    <option '.$sel[7].'  value="7">7</option>
    <option '.$sel[8].'  value="8">8</option>
    <option '.$sel[9].'  value="9">9</option>
    <option '.$sel[10].'  value="10">10</option>
    <option '.$sel[12].'  value="12">12</option>
    <option '.$sel[15].'  value="15">15</option>
    <option '.$sel[20].'  value="20">20</option>
    <option '.$sel[25].'  value="25">25</option>
    <option '.$sel[30].'  value="30">30</option>
  </select>'.slc_info($t2);
}
function slc_selpos($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo '<select  name="'.$b.'">
    <option '.$sel[1].'  value="1">1</option>
    <option '.$sel[2].'  value="2">2</option>
    <option '.$sel[3].'  value="3">3</option>
    <option '.$sel[4].'  value="4">4</option>
    <option '.$sel[5].'  value="5">5</option>
    <option '.$sel[6].'  value="6">6</option>
    <option '.$sel[7].'  value="7">7</option>
    <option '.$sel[8].'  value="8">8</option>
    <option '.$sel[9].'  value="9">9</option>
    <option '.$sel[10].'  value="10">10</option>
  </select>'.slc_info($t2);
}
function slc_selspace($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo '<select  name="'.$b.'">
    <option '.$sel[0].'  value="0">Hide</option>
    <option '.$sel[1].'  value="1">Add Space</option>
    <option '.$sel[2].'  value="2">Add hr tag</option>
  </select>'.slc_info($t2);
}

function slc_namedate2($p){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo '<select  name="'.$b.'">
    <option '.$sel[1].'  value="1"      >Show Name only</option>
    <option '.$sel[2].'  value="2"      >Show Date only</option>
    <option '.$sel[3].'  value="3"      >Show Name and Date</option>
  </select>';
}
function slc_selimg($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel['thumbnail'].'  value="thumbnail"      >Thumbnail</option>
    <option '.$sel['medium'].'  value="medium"      >Medium</option>
    <option '.$sel['large'].'  value="large"      >Large</option>
  </select>'.slc_info($t2);
}


function slc_checkbox($p,$t='',$t2 = '') {
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';
  
  if ($v > 0){  
    $c = 'CHECKED'; 
  }
  echo $t.'<input name="'.$b.'"  type="checkbox" value="1" class="code" '.$c.' /> <i>'.slc_info($t2).'</i>';
}
function slc_switch($p,$t='',$t2=''){ 
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';

  $sel[$v] = 'selected="selected"';
  echo $t.'<select  name="'.$b.'">
    <option '.$sel[1].'  value="1"        >YES </option>
    <option '.$sel[0].'  value="0"      >NO </option>
  </select><i>'.slc_info($t2).'</i>';
}
function slc_str($p,$t='',$t2='',$l = 4) {
  global $gvlayout;
  $v = slc_val($p,$gvlayout);
  $b = 'slc_options_'.$gvlayout.'['.$p.']';
  echo $t.'<input name="'.$b.'" size="'.$l.'" type="text" value="'.$v.'" />'.slc_info($t2);
} 











function slc_menu(){
  return '';
}

//-------------------------------------------------------------------------------------------------

function slc_list($gvshow, $act2){
  global $post,$gvdisplayed,$gvco,$glsc,$gvwt;

  $dual = slc_val('dual',$gvshow);
  
  wp_reset_query();
  
  if ($glsc[postid] > 0){
     $q['p'] = $glsc[postid];
  }else{


  $q['post_status'] = 'publish';
  $v = slc_val('status', $gvshow);
  if ($v <> ''){
     $q['post_status'] = $v;
  }
  

  $q['orderby'] = 'date';
  $so = slc_val('sort', 0);
  if ($so == 1){
    $q['orderby'] = 'modified';
  }
  
  

  //cat
  $c1 = slc_val('cat1',$gvshow);
  $c2 = slc_val('cat2',$gvshow); //$glsc[cat2]
  if ($c1 > 0 and $c2 > 0){
    $q['category__and'] = array( $c1, $c2 );
  }else{
    if ($c1 > 0){
      $q['category__and'] = array( $c1 );
    }else{
      if ($c2 > 0){
        $q['category__and'] = array( $c2 );
      }
    }
  }

  if ($glsc[catnotin] > 0){
    $q['category__not_in'] = $glsc[catnotin];
  }
  if ($glsc[video] == 1){
    $q['meta_key'] = 'link';
  }
  if ($glsc[author] > 0){
     $q['author'] = $glsc[author];
  }   
  if (isset($glsc['posttype'])){
     $q['post_type'] = $glsc['posttype'];
  }
  $q['ignore_sticky_posts'] = -1;

  $q['post_date'] = -1;


  if (!slc_val('duplicates',0) == 1){
    $q['post__not_in'] = $gvdisplayed;
  }

 }
 if ($glsc[maxdays] > 0){
   global $gvdays;
   $gvdays = $glsc[maxdays];
   add_filter( 'posts_where', 'slc_filter_where' );
 }



 $posts = 1;
 if ($gvshow > 0){
   $posts = slc_val('posts',$gvshow);
 }
 if ($gvshow == 'top'){
   $posts = slc_val('poststop',0);
 }
 if ($glsc[example] > 0){
  $posts = $glsc[example];
 }
 $q['posts_per_page'] = $posts;





  $act = 1;
  if ( $act > 0 or $act2 > 0){;


  $gvco = 0;
  $r = new WP_Query($q);
  while ( $r->have_posts() and $gvco < $posts) {
   $r->the_post();

   if ($dual == 0){
      $o .= slc_display($gvshow);
   }else{


      if ($gvco % 2){
         $col2 = slc_display($gvshow);
         $o .= slctableh($col1,' ',$col2, '49%','','49%','slc-clear','slc-hpostspace','slc-clear','slc-clear',$gvwt);
         $col1 = '';
         $col2 = '';
      }else{
         $col1 = slc_display($gvshow);

      }

   }

  }

			      

  if ($glsc[maxdays] > 0){
    remove_filter( 'posts_where', 'slc_filter_where' );
  }


  if ($dual > 0 and $col1 <> ''){
      $o .= slctableh($col1,'','', $gvwt,'','','slc-clear','slc-hpostspace','slc-clear','slc-clear',$gvwt);
  }  

  }
  

  $bg = slc_val('areabg',$gvshow);
  $bge = slc_val('cssbg',$gvshow);
  $ibg = 'slc-background'.$bge;
  if ($bg == 5 and $o <> ''){
    $o = slctableh($o,'','',$gvwt,'','',$ibg,'','','slc-clear',$gvwt);
  }


  if ($gvshow == 'top' and $o <> '') {
    $o = '<marquee id="slc-top"  class="c"  direction="left" loop="999" scrollamount="3">'.$o.'</marquee>';
  }

   

  if ($o <> ''){
    $sp = slc_val('layoutspace',0);
    if ($sp == 2){
       $o .= '<hr id="slc-layoutspace"  class="c" ></hr>'; 
    }
    if ($sp == 1){
       $o .= '<p id="slc-layoutspace"  class="c" ></p>'; 
    }
  }


  $ti = slc_val('title',$gvshow);
  if ($ti <> '' and $o <> ''){
    $o = slc_div($ti ,'slc-layouttitle').$o;
  }


  if (slc_val('test',0) > 0){
    $info .= 'Below is Layout: '.$gvshow;
    $o = slc_div($info,'slc-test').$o;
  }

   if ($o <> ''){
     return '<div id="slc-clear" class="c">'.$o.'</div>';
   }
return '';

}
function slc_filter_where( $where = '' ) {
  global $gvdays;
  $where .= " AND post_date > '" . date('Y-m-d', strtotime('-'.$gvdays.' days')) . "'";
  return $where;
}
//----------------------------------------------------------------------------------------------
function slc_display($gvmode){
  global $post, $gvdisplayed,$gvpostauthor,$gvco,$glsc,$gvext,$gvwt;


if ($gvmode > 999990) {
 $gvco++;
 $gvdisplayed[] = $post->ID;
 
 $n = slc_val('posts',$gvmode);
 $cat = slc_cattext();
 $tag = slc_tagtext();
 $nam = slc_namedate();
 $e =  slc_excerpt(slc_val('excerptlength',$gvmode), 'slc-excerpt-layout'.$gvmode);
 $t = slc_title('slc-title-layout'.$gvmode);
 $w =slc_val('imgw',$gvmode);
 $h =slc_val('imgh',$gvmode);
 $size = slc_val('size',$gvmode);
 $i = slc_img($w,$h,$size,'slc-img',$tover);
  
 if ($gvco == 1){
   $o .= '<table>';
 }
 if ($gvco == $n){
   $o .= '</table>';
 }


  $o .= '<tr><td>'.$i.'</tr></td>';
 
 
}


if ($gvmode == 'top') {
   $gvco++;

   $d = '';
   if ($gvco > 1){
      $d = ' - ';
   }
   $glink = get_permalink( $post->ID );
   if (slc_catbelong($glsc[topcat])){
      $o .= '<a id="slc-top-title-highlight" class="c" href="'.$glink.'">'.$d.$post->post_title.'</a>';
   }else{
      $o .= '<a id="slc-top-title" class="c" href="'.$glink.'">'.$d.$post->post_title.'</a>';
   }
}


if ($gvmode > 0) {


   $gvco++;
   $gvdisplayed[] = $post->ID;
  


   if ($glsc['nooutput'] == 1){
     return '';
   }

   $gvpostauthor = $post->post_author;



   global $cathideprofile;
   if ($cathideprofile > 0){
         if (slc_catbelong($cathideprofile)){
	    $hp = 1;
	 }
   }
	 
 

   

   $v = slc_val('areatitle',$gvmode);
   if ($v > 0){
      $p = slc_val('postitle',$gvmode);
      $ord[$v*1000+$p] .= slc_title('slc-title-layout'.$gvmode);
   }

   $v = slc_val('areaexcerpt',$gvmode);
   if ($v > 0){
       $p = slc_val('posexcerpt',$gvmode);
       $ord[$v*1000+$p] .=  slc_excerpt(slc_val('excerptlength',$gvmode), 'slc-excerpt-layout'.$gvmode,   slc_val('filter',$gvmode));
   }


   $v = slc_val('areacat',$gvmode);
   if ($v > 0){
      $p = slc_val('poscat',$gvmode);
      $ord[$v*1000+$p] .= slc_cattext(slc_val('maxcat',0));
   }


   $v = slc_val('areatag',$gvmode);
   if ($v > 0){
      $p = slc_val('postag',$gvmode);
      $ord[$v*1000+$p] .= slc_tagtext();
   }


   $v = slc_val('areaauthor',$gvmode);
   if ($v > 0 and $hp <> 1){
        $p = slc_val('posauthor',$gvmode);
        $ord[$v*1000+$p] .= slc_namedate(slc_val('namedate',$gvmode));
   }
   

   $v = slc_val('areavideo',$gvmode);
   if ($v > 0){

     if ($gvext == 1){
       $custom  = get_post_custom($post->ID); 
       $link    = $custom["link"][0];
       if (strlen($link)>6 and strlen($link)<20){
         $vid = '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$link.'" frameborder="0" allowfullscreen></iframe>';
       }   
       $p = slc_val('posvideo',$gvmode);
       $ord[$v*1000+$p] .=  $vid;
     }
   }


   $v = slc_val('areabio',$gvmode);
   if ($v > 0 and $hp <> 1){
       $author = get_the_author();
       $postid = $post->id;
       $a = get_the_author_description();
         if ($a<>""){
           $bi = '<img src="'. get_the_author_meta( 'user_custom_avatar', $current_user->ID, 32 ) .'" />';
           $bio .= slc_div($a,'slc-author-bio');
         }
	 $p = slc_val('posbio',$gvmode);
         $ord[$v*1000+$p] .=  $bio;
   }
   

   $v = slc_val('areaext',$gvmode);
   if ($v > 0){
      $p = slc_val('posext',$gvmode);
      $ord[$v*1000+$p] .=  $glsc[exttext];
   }


   $w =slc_val('imgw',$gvmode);
   $h =slc_val('imgh',$gvmode);
   $size = slc_val('size',$gvmode);

   if ($size <> 'None'){


     $areaimg .= $ord[10001].$ord[10002].$ord[10003].$ord[10004].$ord[10005].$ord[10006].$ord[10007].$ord[10008].$ord[10009].$ord[10010];
     $t = strip_tags($areaimg);
     $i = slc_img($w,$h,$size,'slc-img',$t);


     if ($gvext == 1 and !slc_val('video',$gvmode) > 0){
       $y = slc_video_thumb($w,$h,0);
       if ($y <> ''){
         $i = $y;
       }
     }


     $v = slc_val('areaimage',$gvmode);
     if ($v > 0){
       $p = slc_val('posimage',$gvmode);
       $ord[$v*1000+$p] .=  $i;
     }
     $areaimg = $v;

   }



   //----------------------------------------------
   $areatop .= $ord[1001].$ord[1002].$ord[1003].$ord[1004].$ord[1005].$ord[1006].$ord[1007].$ord[1008].$ord[1009].$ord[1010];
   $arealeft .= $ord[2001].$ord[2002].$ord[2003].$ord[2004].$ord[2005].$ord[2006].$ord[2007].$ord[2008].$ord[2009].$ord[2010];
   $arearight .= $ord[3001].$ord[3002].$ord[3003].$ord[3004].$ord[3005].$ord[3006].$ord[3007].$ord[3008].$ord[3009].$ord[3010];








   global $glimgw;
   $w = $glimgw;

   if (!$w > 0){
     $w = slc_val('imgw',$gvmode);
   }



   $gvwt = '100%';


   $gvwtb = slc_val('wt',$gvmode);
   if ($gvwtb <> ''){
      $gvwt = $gvwtb.'px';
   }



   if ($w > 0){

    if ($areaimg == 2){
      $wl = $w.'px';
    }

    if ($areaimg == 3){
      $wr = $w.'px';
    }

    if ($wl.$wr == ''){
      $wl = $w.'px';
    }

  }


  $bg = slc_val('areabg',$gvmode);
  $bge = slc_val('cssbg',$gvmode);
  $ibg = 'slc-background'.$bge;
  

  if ($placeimg >= 11 and $placeimg <= 20 and $bg == 2){
     //$bg = 3;
  }

  if ($placeimg >= 21 and $placeimg <= 30 and $bg == 1){
     //$bg = 3;
  }

  if ($bg == 1){
    $areatop = slctableh($areatop,'','',$wl,'','',$ibg,'','','slc-clear',$wt);
  }

  if ($bg == 2){
    $arealeft = slctableh($arealeft,'','',$wl,'','',$ibg,'','','slc-clear',$wl);
  }

  if ($bg == 3){
    $arearight = slctableh($arearight,'','',$wr,'','',$ibg,'','','slc-clear',$wr);
  }




  $em = slc_val('embed',$gvmode);


  $e = 3;

  if ($areaimg == 2 and $em == 1){
    $e = 1;
  }

  if ($areaimg == 3 and $em == 1){
    $e = 2;
  }

  if ($areaimg == '0' and $em == 1){
    $e = 1;
  }



  if ($e == 1){
    $o .= $areatop.slctableh($arealeft,'','', $wl,'','','slc-clear','','','slc-embed-left',$wl).$arearight;
  }

  if ($e == 2){
    $o .= $areatop.slctableh($arearight,'','', $wr,'','','slc-clear','','','slc-embed-right',$wr).$arealeft;
  }

  if ($e == 3){
    if ($arealeft <> '' and $arearight <> ''){
      $space = ' ';
    }
    $o .= $areatop.slctableh($arealeft,$space,$arearight, $wl, '', $wr, 'slc-clear','slc-hpostspace','slc-clear','slc-clear');
  }

   

  if ($bg == 4){
    $o = slctableh($o,'','',$gvwt,'','',$ibg,'','','slc-clear',$gvwt);
  }


  $o = slctableh($o,'','',$gvwt,'','','slc-clear','','','slc-vpostspace',$gvwt);
    
 
  }
  wp_reset_postdata();
  return $o;
}





function slc_div($t,$id,$link=''){
  if (trim($t) == ''){
     return '';
  }
  if ($id == ''){
     return $t;
  }
  
  global $glsc;
  if ($link <> '' and $glsc[link] <> '0'){
     $t = '<a  id="'.$id.'"  class="c" style="display:block !important;" href="'.$link.'">'.$t.'</a>';
     return $t;
  }
  $r = '<p id="'.$id.'"  class="c">'.$t.'</p>';
  $r .= '<p id="slc-velementspace"  class="c"></p>';
  return $r;
}



function slc_img($w = 220, $h = '', $size = 'thumbnail', $id='slc-img', $t = ''){
   if ($size <> 'thumbnail' and $size <> 'medium' and $size <> 'large'){
       $size = 'thumbnail';
   }

   global $post,$glsc,$gvmode;
   $glink = get_permalink( $post->ID );
   
   

   if (function_exists('has_post_thumbnail')) {
   if (has_post_thumbnail()){
     $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size);
   }
   }
   


   if ($image_url[0] == ''){
  //  if (slc_val('imginsert',0) == 1){
     $args = array(
        'numberposts' => 1,
        'order'=> 'ASC',
	'post_mime_type' => 'image',
	'post_parent' => $post->ID,
	'post_status' => null,
	'post_type' => 'attachment'
	);
	
     $attachments = get_children( $args );

     foreach($attachments as $attachment) {
       $image_url = wp_get_attachment_image_src( $attachment->ID, $size );
     }
  // }
}

  
  
  

  

  

   $img = $image_url[0];
   $worg = $image_url[1];
   $horg = $image_url[2];


   
   if ($img == ''){
      return '';
   }
   
 
  
   if ($worg > 1 and $horg > 1){
   

 

   $r = $worg/$horg; //number > 1 normally


   $maxw = slc_val('maxw',$gvmode);
   if ($maxw > 0 and $w > $maxw){
     $w = $maxw;
   }


   $maxh = slc_val('maxh',$gvmode);
   if ($maxh > 0 and $w > $maxh){
     $w = $maxh;
   }


   if (!$w > 0 and !$h > 0){
      $w = $worg;
      $h = $horg;
   }


   if (!$w > 0 and $h > 0){
     $w = $h*$r;
   }


   if ($w > 0 and !$h > 0){
     $h = $w/$r;
   }


   $w = round($w);
   $h = round($h);



   global $glimgw;
   $glimgw = $w;
   
  

   $w2 = 'width:'.$w.'px !important;';
   $h2 = 'height:'.$h.'px !important;'; //force height


   //scroll effects
   if ($glsc['overimageeffect'] == 1){
      $t = '<marquee direction="up" BEHAVIOR="slide" height = "11" loop="1" scrollamount="1" >'.$t.'</marquee>';
   }
   if ($glsc['overimageeffect'] == 2){
      $t = '<marquee direction="left" BEHAVIOR="slide" height = "11" loop="1" scrollamount="1" >'.$t.'</marquee>';
   }
   
   

   $i = '<img id="slc-img" class="c" src="'.$img.'"  style="'.$w2.$h2.'">';


   if ($glsc[link] <> '0' and $glink <> ""){
      $i = '<a id ="slc-clear" href="'.$glink.'" >'.$i.'</a>';
   }
   

   if ($t <> ''){
     $oi = '<div id="slc-overimage" class="c">'.$t.'</div>';
     $i = '<div id="slc-clear" class="c">'.$i.$oi.'</div>';
   }



   return $i;


   } 
   return '';
}
function slc_title($id='',$l = 300){
  global $post;
  $glink = get_permalink( $post->ID );
  if ($id<>''){
     $a = 'id = "'.$id.'"';
  }
  $t = $post->post_title;
  if (strlen($t) > $l){
     $t = substr($t, 0, $l).'...';
  }
  return slc_div($t,$id,$glink);
}
function slc_excerpt($l = 100, $id='slc-excerpt',$filter = 1){
   global $post;
   $glink = get_permalink( $post->ID );
   if ($id<>''){
     $a = 'id = "'.$id.'"';
   }

   if (strlen($post->post_excerpt) > 1){
     $t = $post->post_excerpt;
   }else{
     $t = $post->post_content;
   }

   if ($filter == 1 or $filter == ''){
     $t = strip_shortcodes(strip_tags($t));
   }else{
     $t = apply_filters('the_content',$t);
   }


   $cont = '...';
   
   if (slc_val('period',0) == 1){
     $p = strrpos(substr($t, 0, $l),'.');
     if ($p > 0 and $p < $l and $l > 0){
       $l = $p+1;
       $cont = '';
     }
   }
   if (strlen($t) > $l and $l > 0){
     $t = substr($t, 0, $l).$cont;
   }
   return slc_div($t,$id,$glink);
}
//list cats
function slc_cattext($max = '',$id = 'slc-categories'){
   global $post;
   if (!$max > 0){
      $max = 1000;
   }

   $o = "";
   $co = 0;
   foreach((get_the_category()) as $category) { 
   
    if (substr($category->slug,0,4) <> 'hide' and $category->cat_ID <> 1){
     $co ++;

     if ($co <= $max){
       if ($co > 1){
         $o .= ' - ';
       }
       $o .= $category->cat_name; 
     }
    }
   }
   if ($o == ''){
     return '';
   }
   return slc_div($o,$id);
}
//list tags
function slc_tagtext(){
   global $post;
   $posttags = get_the_tags();
   if ($posttags) {
     foreach($posttags as $tag) {
       $o .= $tag->name . ' '; 
     }
   }
   if ($o == ''){
     return '';
   }
   return slc_div($o,'slc-tags');
}
//check if category exist in the post
function slc_catbelong($cat){
   if ($cat > 0){
   global $post;
   foreach((get_the_category()) as $category) { 
    if ($category->cat_ID == $cat){
     return true;
    }
   }
   }
   return false;
}
function slc_namedate($m = ''){
   global $post;
   $name = get_the_author_meta('display_name', $post->post_author);
   $ti = get_the_time('F j, Y');

   if ($m == 1){
     $t = ''.$name;
   }
   if ($m == 2){
     $t = 'Date '.$ti;
   }
   if ($m == 3 or $m == ''){
     $t = ''.$name.', '.$ti;
   }
   $o .= slc_div($t,'slc-author-date');
   return $o;
}



//+++++++++++++++++++++++++++++++++++++++++++++++++++
function slctext($t,$s="16",$c="black",$m=0, $inl=0){
   if ($inl == 1){
     $i = "display:inline;";
   }
   return '<p style="color:'.$c.';font-size:'.$s.'px; text-align:left; padding: 0px; margin: 0px; 0px '.$m.'px 0px; '.$i.'">'.$t.'</p>';
}  

function slc_spaceoff($a){
  return '<table height="'.$a.'" style="padding:0px; margin: 0px; border: 0px;"><tr><td style="padding:0px; margin: 0px; border: 

0px;"></td></tr></table>';
}


function slctablev($t1="",$t2="",$t3="", $id1='', $id2='', $id3='', $idt='slc-table'){
   if ($t1<>""){
      $td1 = '<tr><td id="'.$id1.'"  class="c">'.$t1.'</td></tr>';
   }
   if ($t2<>""){
      $td2 = '<tr><td id="'.$id2.'"  class="c">'.$t2.'</td></tr>';
   }
   if ($t3<>""){
      $td3 = '<tr><td id="'.$id3.'"  class="c">'.$t3.'</td></tr>';
   }
   return '<table width="100%" id="'.$idt.'"  class="c"  cellspacing="0" cellpadding="0" border="0">'.$td1.$td2.$td3.'</table>';
}
function slctableh($t1="",$t2="",$t3="", $w1 = '', $w2 = '', $w3 = '', $id1='', $id2='', $id3='', $idt='slc-table',$tw = '100%'){
   if ($t1 == '' and $t2 == '' and $t3 == ''){
     return '';
   }
   if ($w1 <> ''){
      $wi1 = ' style="width:'.$w1.' !important;" ';
   }
   if ($w2 <> ''){
      $wi2 = ' style="width:'.$w2.' !important;" ';
   }
   if ($w3 <> ''){
      $wi3 = ' style="width:'.$w3.' !important;" ';
   }
   if ($t1<>""){
      $td1 = '<td id="'.$id1.'" '.$wi1.'   class="c">'.trim($t1).'</td>';
   }
   if ($t2<>""){
      $td2 = '<td id="'.$id2.'" '.$wi2.'   class="c">'.trim($t2).'</td>';
   }
   if ($t3<>""){
      $td3 = '<td id="'.$id3.'" '.$wi3.'   class="c">'.trim($t3).'</td>';
   }
   return '<table style="width:'.$tw.' !important;" id="'.$idt.'"    class="c" cellspacing="0" cellpadding="0" border="0"><tr id="slc-clear" class="c" >'.$td1.$td2.$td3.'</tr></table>';
}
function slclayouth($t1="",$t2="",$t3="", $w1 = '', $w2 = '', $w3 = '', $id1='', $id2='', $id3='', $idt='slc-table',$tw = '100%'){
   if ($t1 == '' and $t2 == '' and $t3 == ''){
     return '';
   }
   if ($w1 <> ''){
      $wi1 = ' style="width:'.$w1.';" ';
   }
   if ($w2 <> ''){
      $wi2 = ' style="width:'.$w2.';" ';
   }
   if ($w3 <> ''){
      $wi3 = ' style="width:'.$w3.';" ';
   }
   if ($t1<>""){
      $td1 = '<td '.$id1.' '.$wi1.'  >'.trim($t1).'</td>';
   }
   if ($t2<>""){
      $td2 = '<td '.$id2.' '.$wi2.'  >'.trim($t2).'</td>';
   }
   if ($t3<>""){
      $td3 = '<td '.$id3.' '.$wi3.'  >'.trim($t3).'</td>';
   }
   return '<table style="width:'.$tw.';" id="'.$idt.'"    class="c" cellspacing="0" cellpadding="0" border="0"><tr id="slc-clear" class="c" >'.$td1.$td2.$td3.'</tr></table>';
}

// shortcode -------------------------------------------------------------------------------------------
function slcshortcode($atts) {

    global $glsc;

    $glsc = array();
    $glsc = $atts;

    $cat1 = $atts[cat1];
    $cat2 = $atts[cat2];

    $show = $atts[show]; 
 
 //show shortcode without activating it
 if ($atts[view] <> ''){
    $t = $atts[view];
    $t = str_replace("*", '"', $t);
    $a = '<pre>[layout '.$t.']</pre>';
    return $a;
 } 

 global $gvext;
 if ($gvext > 0){
   if ($show == 'ext_menu'){
        if (function_exists('ext_menu')) {
	  return ext_menu();
	}
   }
 } 


 if ($show <> ''){
    return slc_list($glsc[show],1);
 }

 return ' Site Layout Customizer - not valid Shortcode, please see manual for examples '.$atts[show];
}

add_shortcode('layout', 'slcshortcode');
add_filter('widget_text', 'do_shortcode');
?>