<?php
$orig = "I'll \"walk\" the <b>dog</b> now";



$orig3 = <<<EOD
<div contenteditable="true">
<ol><li>Chapter 1 The Financial Reporting Environment</li><li>Chapter 2 Financial Accounting Theory 3 Judgement and Applied Financial Accounting Research</li><li>Chapter 3 Review of the Accounting Cycle</li><li>Chapter 4 Statements of Net Income and Comprehensive Income</li><li>Chapter 4 Statements of Net Income and Comprehensive Income</li><li>Chapter 5 Statements of Financial Position and Cash Flows and the Annual Report</li><li>Chapter 5 Statements of Financial Position and Cash Flows and the Annual Report</li><li>Chapter 8 Revenue Recognition</li><li>Chapter 9 Short-Term Operating Assets: Cash and Receivables</li><li>Chapter 10 Short-Term Operating Assets: Inventory</li><li>Chapter 10 Short-Term Operating Assets: Inventory</li><li>Chapter 11 Long-Term Operating Assets: Acquisition, Cost Allocation, and Derecognition</li><li>Chapter 11 Long-Term Operating Assets: Acquisition, Cost Allocation, and Derecognition</li><li>Chapter 10 Long-Term Operating Assets: Departures from Historical Cost</li><li>Final Exam</li></ol>
</div>
EOD;

$a = htmlentities($orig);

$b = html_entity_decode($a);

$c = htmlentities($orig3);

$d = html_entity_decode($c);


echo $a; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now<br>
echo "<br>";
echo $b; // I'll "walk" the <b>dog</b> now
echo "<br>";
echo $c; // I'll "walk" the <b>dog</b> now
echo "<br>";
echo $d; // I'll "walk" the <b>dog</b> now
echo "<br>";






/* Entity crap. */
$input = "Fovi&#269;";

$output = preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $input);

/* Plain UTF-8. */
echo $output;
?>