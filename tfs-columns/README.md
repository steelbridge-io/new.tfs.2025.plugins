# TFS Columns

## Create three columns in WordPress editor
Place [row-open] at the top of your initial column. 
[row-open] = <div class="container"> <div class="row">

Place [row-close] at the bottom of where you want the third column to terminate.
[row-close] = </div></div>

Place [col-one-third] at the top of the first, second and third coluns.
[col-one-third] = <div class="col-sm-4">

Place [col-one-half] at the top of the first, second columns
[col-one-half] = <div class="col-sm-6">

Place [col-close] at the end of each colun
[col-close] = </div>

Example

<h1>Title of document</h1>
<p>Description or introduction</p>

[row-open][col-one-third]

<ul>
<li>List Content<li>
...
...
</ul>

[col-close][col-one-third]

<ul>
<li>List Content</li>
...
...
</ul>

[clo-close][col-one-third]

<p>Text and sorts of content</p>

[col-close][row-close]