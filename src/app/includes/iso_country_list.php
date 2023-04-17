<h3>ISO Country List - HTML select/dropdown snippet</h3>
<p>
    Included in this page are the HTML select/dropdown code snippets to generate a list of countries using the
    ISO-3166-1 and ISO-3166-2 codes.
</p>
<p>
    You can choose between ISO-3166-1 Alpha-2, ISO-3166-1 Alpha-3, ISO-3166 Numeric or the latest ISO-3166-2 codes.
    Consult the <a href="http://en.wikipedia.org/wiki/ISO_3166-1">ISO-3166 Wikipedia page</a> for more details.
</p>
<p>
    <strong>Some country names have accents and other non-ascii characters, so make sure to set your HTML page's
        encoding properly. UTF-8 works perfectly for this.</strong>
</p>
<ul>
    <li><a href="#alpha2">ISO-3166-1 - Alpha 2 Codes</a></li>
    <li><a href="#alpha3">ISO-3166-1 - Alpha 3 Codes</a></li>
    <li><a href="#numeric">ISO-3166-1 - Numeric Codes</a></li>
    <li><a href="#iso31662">ISO-3166-2 - Alpha Codes</a></li>
</ul>
<hr>
<h3 id="alpha2">ISO-3166-1: Alpha-2 Codes</h3>
<pre><code class="language-html"><?php
        $file = file_get_contents('files/country-list/country-list-iso-3166-1-alpha-2-codes.html');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="alpha3">ISO-3166-1: Alpha-3 Codes</h3>
<pre><code class="language-html"><?php
        $file = file_get_contents('files/country-list/country-list-iso-3166-1-alpha-3-codes.html');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="numeric">ISO-3166-1: Numeric Codes</h3>
<pre><code class="language-html"><?php
        $file = file_get_contents('files/country-list/country-list-iso-3166-1-alpha-numeric-codes.html');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="iso31662">ISO-3166-2 - Alpha Codes</h3>
<pre><code class="language-html"><?php
        $file = file_get_contents('files/country-list/country-list-iso-3166-2-alpha-codes.html');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="iso31662">Array</h3>
<pre><code class="language-html"><?php
        $file = file_get_contents('files/country-list/country-list-array.txt');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="iso31662">MySQL Country Names Table</h3>
<pre><code class="language-sql"><?php
        $file = file_get_contents('files/country-list/countries.sql');
        echo htmlspecialchars($file);
        ?></code></pre>
<div class="separator marginT20 marginB20"></div>
<h3 id="iso31662">MySQL Continents</h3>
<pre><code class="language-sql"><?php
        $file = file_get_contents('files/country-list/continent.sql');
        echo htmlspecialchars($file);
        ?></code></pre>
