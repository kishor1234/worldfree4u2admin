<?php
$result = dns_get_record("baxi.org.in");
print_r($result);
?>
<br>
<?php
 if ( checkdnsrr('baxi.org.in', 'ANY') ) {
  echo "DNS Record found";
 }
 else {
  echo "NO DNS Record found";
 }
 ?><br>
<?php
 $domain = 'baxi.org.in';
 if ( gethostbyname($domain) != $domain ) {
  echo "DNS Record found";
 }
 else {
  echo "NO DNS Record found";
 }
?>