<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Docs page layout -->
    <div class="bs-header" id="content">
      <div class="container">
        <h1>起步</h1>
        <p>简要介绍Bootstrap，以及如何下载、使用，基本模版和案例，等等。</p>
        
      </div>
    </div>

    <!-- Callout for the old docs link -->
    

    <div class="container bs-docs-container">
      <div class="row">
        <div class="col-md-3">
          <div class="bs-sidebar hidden-print" role="complementary">
            <ul class="nav bs-sidenav">
              
                <li>
  <a href="#download">下载Bootstrap</a>
  <ul class="nav">
    <li><a href="#download-compiled">编译后的CSS、JS和字体文件</a></li>
    <li><a href="#download-additional">额外的下载渠道</a></li>
    <li><a href="#download-cdn">Bootstrap CDN</a></li>
  </ul>
</li>
<li>
  <a href="#whats-included">包含了哪些文件</a>
  <ul class="nav">
    <li><a href="#whats-included-precompiled">编译版</a></li>
    <li><a href="#whats-included-source">源码</a></li>
  </ul>
</li>
<li>
  <a href="#template">基本模版</a>
</li>
<li>
  <a href="#examples">案例</a>
</li>

                                  
            </ul>
          </div>
        </div>
        <div class="col-md-9" role="main">
          


  <!-- Getting started
  ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <h1 id="download">下载Bootstrap</h1>
    </div>
    <p class="lead">Bootstrap提供了几种可以帮你快速上手的方式，每种方式针对具有不同技能等级的开发者和不同的使用场景。继续阅读下面的内容，看看哪种方式适合你的需求吧。</p>

    <h3 id="download-compiled">编译后的CSS、JS和字体文件</h3>
    <p>获取Bootstrap最快速的方式就是下载经过编译和压缩的CSS、JavaScript文件，另外还包含字体文件。但是不包含文档和源码文件。</p>
    <p><a class="btn btn-lg btn-primary" href="https://github.com/twbs/bootstrap/releases/download/v3.0.3/bootstrap-3.0.3-dist.zip" >下载Bootstrap</a></p>

    <h3 id="download-additional">额外的下载渠道</h3>
    <div class="bs-docs-dl-options">
      <h4>
        <a href="https://github.com/twbs/bootstrap/archive/v3.0.3.zip" >下载源码</a>
      </h4>
      <p>从GitHub可以直接下载到Bootstrap最新版本的LESS和JavaScript源码。</p>
      <h4>
        <a href="https://github.com/twbs/bootstrap" >Clone or fork via GitHub</a>
      </h4>
      <p>访问我们的Github源码库，你可以克隆整个项目，或者fork整个项目到你自己的账号。</p>
      <h4>
        通过<a href="http://bower.io">Bower</a>工具安装
      </h4>
      <p>通过<a href="http://bower.io">Bower</a>可以安装并管理Bootstrap的样式、JavaScript文件和文档。</p>
      <div class="highlight">
<p><code>bash$ bower install bootstrap</code></p>

</div>
    </div>

    <h3 id="download-cdn">使用Bootstrap中文网提供的CDN加速服务</h3>
    <p><a href="http://www.bootcss.com/">Bootstrap中文网</a>为Bootstrap构建了自己的CDN加速服务，并且采用国内云厂商的CDN服务，访问速度更快、加速效果更明显、没有速度和带宽限制、永久免费。Bootstrap中文网还对大量的开源工具库提供了CDN服务，请进入<a href="http://open.bootcss.com/">Open CDN 主页</a>查看更多可用的工具库。</p>
<div class="highlight">
<pre><code class="language-html">&lt;!-- 最新 Bootstrap 核心 CSS 文件 --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&/cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css&quot;&gt;

&lt;!-- 可选的Bootstrap主题文件（一般不用引入） --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&/cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css&quot;&gt;

&lt;!-- jQuery文件。务必在bootstrap.min.js 之前引入 --&gt;
&lt;script src=/cdn.bootcss.com/jquery/1.10.2/jquery.min.js&quot;&gt;&lt;/script&gt;

&lt;!-- 最新的 Bootstrap 核心 JavaScript 文件 --&gt;
&lt;script src=/cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;</code></pre>

</div>

    <h3>使用国外的CDN加速服务</h3>
    <p><a href="http://www.maxcdn.com/">MaxCDN</a>为Bootstrap免费提供了CDN加速服务。使用<a href="http://www.bootstrapcdn.com/">Bootstrap CDN</a>提供的链接即可引入Bootstrap文件。</p>
<div class="highlight">
<pre><code class="language-html">&lt;!-- 最新 Bootstrap 核心 CSS 文件 --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css&quot;&gt;

&lt;!-- 可选的Bootstrap主题文件（一般不用引入） --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css&quot;&gt;

&lt;!-- 最新的 Bootstrap 核心 JavaScript 文件 --&gt;
&lt;script src=&quot;//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;</code></pre>

</div>

    <div class="bs-callout bs-callout-warning" id="callout-less-compilation">
      <h4>编译Bootstrap的LESS源码文件</h4>
      <p>如果你下载的是源码文件，那就需要将Bootstrap的LESS源码编译为可以使用的CSS代码，目前，Bootstrap官方仅支持<a href="http://twitter.github.io/recess/">Recess</a>编译工具，这是Twitter提供的基于<a href="http://lesscss.org">less.js</a>构建的编译、代码检测工具。</p>
    </div>
  </div>


  <!-- File structure
  ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <h1 id="whats-included">包含了哪些文件</h1>
    </div>
    <p class="lead">Bootstrap提供了两种形式的压缩包，在下载下来的压缩包内可以看到以下目录和文件，这些文件按照类别放到了不同的目录内，并且提供了压缩与未压缩两种版本。</p>

    <div class="bs-callout bs-callout-warning" id="jquery-required">
      <h4>Bootstrap依赖jQuery</h4>
      <p>请注意，<strong>所有 JavaScript 插件都依赖 jQuery，因此jQuery必须在Bootstrap之前引入</strong>， 就像在 <a href="#template">基础模版</a>中所展示的一样。<a href="https://github.com/twbs/bootstrap/blob/v3.0.3/bower.json">在 <code>bower.json</code>文件</a> 中列出了Bootstrap所支持的jQuery版本。</p>
    </div>

    <h2 id="whats-included-precompiled">预编译Bootstrap版本</h2>
    <p>下载压缩包之后，将其解压缩到任意目录即可看到以下目录结构：</p>

<!-- NOTE: This info is intentionally duplicated in the README.
Copy any changes made here over to the README too. -->
<div class="highlight">
<pre><code class="language-bash">bootstrap/
├── css/
│   ├── bootstrap.css
│   ├── bootstrap.min.css
│   ├── bootstrap-theme.css
│   └── bootstrap-theme.min.css
├── js/
│   ├── bootstrap.js
│   └── bootstrap.min.js
└── fonts/
    ├── glyphicons-halflings-regular.eot
    ├── glyphicons-halflings-regular.svg
    ├── glyphicons-halflings-regular.ttf
    └── glyphicons-halflings-regular.woff</code></pre>

</div>

    <p>这是最基本的Bootstrap组织形式：未压缩版的文件可以在任意web项目中直接使用。我们提供了压缩(<code>bootstrap.min.*</code>)与未压缩 (<code>bootstrap.*</code>)的CSS和JS文件。字体图标文件来自于Glyphicons。</p>

    <h2 id="whats-included-source">Bootstrap 源码</h2>
    <p>Bootstrap源码包含了预先编译的CSS、JavaScript和图标字体文件，并且还有LESS、JavaScript和文档的源码。具体来说，主要文件组织结构如下：</p>
<div class="highlight">
<pre><code class="language-bash">bootstrap/
├── less/
├── js/
├── fonts/
├── dist/
│   ├── css/
│   ├── js/
│   └── fonts/
├── docs-assets/
├── examples/
└── *.html</code></pre>

</div>
    <p><code>less/</code>、<code>js/</code> 和 <code>fonts/</code> 分别包含了CSS、JS和字体图标的源码。<code>dist/</code> 目录包含了上面所说的预编译Bootstrap包内的所有文件。<code>docs-assets/</code>、<code>examples/</code> 和所有 <code>*.html</code> 文件是文档的源码文件。除了前面提到的这些文件，还包含package定义文件、许可证文件等。</p>
  </div>


  <!-- Template
  ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <h1 id="template">基本模版</h1>
    </div>
    <p class="lead">使用以下给出的这份超级简单的HTML模版，或者修改<a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started#examples">这些案例</a>。我们强烈建议你对这些案例按照自己的需求进行修改，而不要简单的复制、粘贴。</p>

    <p>拷贝并粘贴下面给出的HTML代码，这就是一个最简单的Bootstrap页面了。</p>
<div class="highlight">
<pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Bootstrap 101 Template&lt;/title&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
    &lt;!-- Bootstrap --&gt;
    &lt;link rel=&quot;stylesheet&quot; href=&/cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css&quot;&gt;

    &lt;!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --&gt;
    &lt;!-- WARNING: Respond.js doesn&#39;t work if you view the page via file:// --&gt;
    &lt;!--[if lt IE 9]&gt;
        &lt;script src=/cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js&quot;&gt;&lt;/script&gt;
        &lt;script src=/cdn.bootcss.com/respond.js/1.3.0/respond.min.js&quot;&gt;&lt;/script&gt;
    &lt;![endif]--&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hello, world!&lt;/h1&gt;

    &lt;!-- jQuery (necessary for Bootstrap&#39;s JavaScript plugins) --&gt;
    &lt;script src=/cdn.bootcss.com/jquery/1.10.2/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;!-- Include all compiled plugins (below), or include individual files as needed --&gt;
    &lt;script src=/cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>

</div>
  </div>


  <!-- Template
  ================================================== -->
  <div class="bs-docs-section">
    <div class="page-header">
      <h1 id="examples">案例</h1>
    </div>
    <p class="lead">下面这些案例都是基于上面给出的基本模版并结合Bootstrap组件制作的。后续我们还会讲解如何定制这些组件。</p>

    <div class="row bs-examples">
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/starter-template/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/starter-template.jpg" alt="">
        </a>
        <h4>最简页面</h4>
        <p>只有一些最基本的东西：引入了未压缩版的CSS和JavaScript文件，页面只有一个container容器。</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/grid/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/grid.jpg" alt="">
        </a>
        <h4>栅格系统</h4>
        <p>多个栅格系统布局的案例展示。</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/jumbotron/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/jumbotron.jpg" alt="">
        </a>
        <h4>Jumbotron</h4>
        <p>Build around the jumbotron with a navbar and some basic grid columns.</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/jumbotron-narrow/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/jumbotron-narrow.jpg" alt="">
        </a>
        <h4>Narrow jumbotron</h4>
        <p>Build a more custom page by narrowing the default container and jumbotron.</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/navbar/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/navbar.jpg" alt="">
        </a>
        <h4>导航条</h4>
        <p>Super basic template that includes the navbar along with some additional content.</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/navbar-static-top/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/navbar-static.jpg" alt="">
        </a>
        <h4>置于页面顶部的导航条</h4>
        <p>Super basic template with a static top navbar along with some additional content.</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/navbar-fixed-top/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/navbar-fixed.jpg" alt="">
        </a>
        <h4>固定位置的导航条</h4>
        <p>Super basic template with a fixed top navbar along with some additional content.</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/signin/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/sign-in.jpg" alt="">
        </a>
        <h4>登录页面</h4>
        <p>基本的登录页面，使用到了自定义的表单布局和设计。</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/sticky-footer/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/sticky-footer.jpg" alt="">
        </a>
        <h4>页脚固定在底部</h4>
        <p>将固定高度的页脚钉在页面可视区域的最下方。</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/sticky-footer-navbar/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/sticky-footer-navbar.jpg" alt="">
        </a>
        <h4>Sticky footer with navbar</h4>
        <p>Attach a footer to the bottom of the viewport with a fixed navbar at the top.</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/justified-nav/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/justified-nav.jpg" alt="">
        </a>
        <h4>两端对齐的导航条</h4>
        <p>Create a custom navbar with justified links. Heads up! <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/components/#nav-justified">Not too WebKit friendly.</a></p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/offcanvas/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/offcanvas.jpg" alt="">
        </a>
        <h4>Offcanvas</h4>
        <p>Build a toggleable off-canvas navigation menu for use with Bootstrap.</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/carousel/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/carousel.jpg" alt="">
        </a>
        <h4>大屏轮播</h4>
        <p>定制了导航条和轮播组件，并添加了一些自定义的新组件。</p>
      </div>
      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/non-responsive/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/non-responsive.jpg" alt="">
        </a>
        <h4>非响应式的Bootstrap</h4>
        <p>按照我们给出的<a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/#disable-responsive">方式</a>可以很容易禁用Bootstrap的响应式特性。</p>
      </div>
      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/theme/">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/examples/screenshots/theme.jpg" alt="">
        </a>
        <h4>Bootstrap主题</h4>
        <p>页面额外加载了一套Bootstrap主题，加强了页面的视觉效果</p>
      </div>
    </div>

  </div>

<!-- end of main content -->

        </div>
      </div>

    </div>