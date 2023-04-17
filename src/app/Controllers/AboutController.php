<?php

namespace App\Controllers;

class AboutController
{
	
    public function index()
    {
        $pageTitle = 'About';
        $pageCategory = 'about';
        $message = '<p class="first">Hello, Welcome to ' . SITE_NAME . '</b>.</P>
<p><span style="color:#a6780c; font-weight:bold">' . SITE_NAME . '</span> is a comprehensive collection of powerful tools designed to facilitate web development, network security, image editing, OSINT, AI, and torrent handling tasks.</p>
<p>This project combines the power of PHP, HTML, and JavaScript to provide users with an all-in-one toolset. With a range of tools for encoding/decoding, cryptography, web development, image editing, network tools, pentesting, OSINT, AI, and torrent handling, this collection is a must-have for developers, network administrators, security experts, investigators, and researchers.</p>

<P>If you have any questions, ideas, or suggestions, please contact me at :<br> <a href="mailto:%6d%69%72%61%6e%61%2d%64%7a%40%70%72%6f%74%6f%6e%2e%6d%65">mirana-dz [at sign] proton [dot] me</a></p>
<header class="separator marginT20 marginB20"></header>
		<div id="arabic_about">
		<p>
		<span class="center"><img src="images/basmala.png" alt="البسملة" width="294" height="36"></span><br>
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
';
        // Load the view for the About page
        require_once('../app/views/about.php');
    }
}