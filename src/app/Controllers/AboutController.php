<?php

namespace App\Controllers;

class AboutController
{
    public function index(): void
    {
        $pageTitle = 'About';
        $pageCategory = 'About';
        $message = '<p class="first">Hello, Welcome to ' . SITE_NAME . '</b>.</P>
<p><span style="color:#a6780c; font-weight:bold">' . SITE_NAME . '</span> is a comprehensive collection of powerful tools designed to facilitate web development, network security, image editing, OSINT, AI, and torrent handling tasks.</p>
<p>This project combines the power of PHP, HTML, and JavaScript to provide users with an all-in-one toolset. With a range of tools for encoding/decoding, cryptography, web development, image editing, network tools, pentesting, OSINT, AI, and torrent handling, this collection is a must-have for developers, network administrators, security experts, investigators, and researchers.</p>

<P>If you have any questions, ideas, or suggestions, please contact me at :<br> <a href="mailto:%6d%69%72%61%6e%61%2d%64%7a%40%70%72%6f%74%6f%6e%2e%6d%65">mirana-dz [at sign] proton [dot] me</a></p>
<header class="separator marginT20 marginB20"></header>
		<div id="arabic_about">
		<p>
		<span class="center"><img src="assets/images/basmala.png" alt="البسملة" width="294" height="36"></span><br>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  الحمد لله رب العالمين. والصلاة والسلام على أشرف المرسلين، وعلى آله وصحبه ومن والاه ومن تبعهم بإحسان وإهتدى بهديهم وسار على نهجهم إلى يوم الدين.
		</p><br>
		<div class="title center">هــذا الموقــع</div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 قمنا وبحمد الله بإنشاء هذا الموقع بغرض جمع أدوات وتقنيات، وتسطيرها في صفحات لتسهيل العودة إليها عند الحاجة. يحتوي الموقع عـلى أدوات مفيدة لمطويري البرمجيات، للتشفير وفك التشفير ومحولات مختلفة ومولدات أكواد تساعد وتسهل عمل المبرمج.  <br>
سيتم إضافة المزيد من الأدوات من وقت إلى آخر، وتحسين أداء الموقع في الأيام القادمة إن شاء الله، ولأي إستفسار أو إقتراح يرجى الإتصال بي على الإيمايل التالي :  
<a href="mailto:%6d%69%72%61%6e%61%2d%64%7a%40%70%72%6f%74%6f%6e%2e%6d%65">mirana-dz [at sign] proton [dot] me</a>
</p>
</div>

<style>
.container1 {
   text-align: center;
 }

.container1 pre {
  display: inline-block;
  text-align: left;
  color: #a6780c;
 }
 </style>

<div class="container1">
<pre>

███╗   ███╗██╗██████╗  █████╗ ███╗   ██╗ █████╗       ██████╗ ███████╗
████╗ ████║██║██╔══██╗██╔══██╗████╗  ██║██╔══██╗      ██╔══██╗╚══███╔╝
██╔████╔██║██║██████╔╝███████║██╔██╗ ██║███████║█████╗██║  ██║  ███╔╝ 
██║╚██╔╝██║██║██╔══██╗██╔══██║██║╚██╗██║██╔══██║╚════╝██║  ██║ ███╔╝  
██║ ╚═╝ ██║██║██║  ██║██║  ██║██║ ╚████║██║  ██║      ██████╔╝███████╗
╚═╝     ╚═╝╚═╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝╚═╝  ╚═╝      ╚═════╝ ╚══════╝   

</pre></div>
<header class="separator marginT20 marginB20"></header>
<h3>Issues & Organisations We Are Happy To Show Our Support For</h3>

<style>
#img1 {
  width: 180px;
  height: 120px;
  margin: 5px;
  padding: 0;
  border: 1px solid #000000;
  line-height: normal;
  vertical-align: middle;
}
</style>
<p align="center">
<a href="https://en.wikipedia.org/wiki/Ummah" target="_blank"><img src="assets/images/support/Muslim_ummah.png" alt="Muslim ummah" title="Muslim ummah" id="img1"></a>
<a href="https://www.google.com/search?q=free+palestine" target="_blank"><img src="assets/images/support/free_palestine.png" alt="Free Palestine" title="Free Palestine" id="img1"></a>
<a href="https://t.me/areennabluss" target="_blank"><img src="assets/images/support/Lions_Den.png" alt="Lions Den" title="Lions Den" id="img1"></a>
<a href="https://twitter.com/alemara_ar" target="_blank"><img src="assets/images/support/Talibans.png" alt="Talibans" title="Talibans" id="img1"></a>
<a href="https://ar.islamway.net/article/87694/منسيون-في-السجون" target="_blank"><img src="assets/images/support/free_the_captive.png" alt="free the captive" title="Free the captive" id="img1"></a>
<a href="https://en.wikipedia.org/wiki/Persecution_of_Muslims_in_Myanmar" target="_blank"><img src="assets/images/support/save_the_rohingya.png" alt="Persecution_of_Muslims_in_Myanmar" title="Persecution of Muslims in Myanmar" id="img1"></a>
<a href="https://www.saveuighur.org/" target="_blank"><img src="assets/images/support/save_uyghur.png" alt="Save Uighur" title="Save Uighur" id="img1"></a>
<a href="https://www.google.com/search?q=save+indian+muslims" target="_blank"><img src="assets/images/support/save_indian_muslims.png" alt="save_indian_muslims" title="Save indian muslims" id="img1"></a>
<a href="https://www.google.com/search?q=save+kashmir" target="_blank"><img src="assets/images/support/save_kashmir.png" alt="save_kashmir" title="Save Kashmir" id="img1"></a>
</p>';

        // Load the view for the About page
        require_once('../app/views/about.php');
    }
}