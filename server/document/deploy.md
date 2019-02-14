#### Deploy 

Centos 6.9 

Change vendor/jeremykendall/php-domain-parser/src/IDNAConverterTrait.php 
Line 110 private function idnToAscii(string $domain): string 

```
if (defined('INTL_IDNA_VARIANT_UTS46')) {

    $output = idn_to_utf8($domain, 0, INTL_IDNA_VARIANT_UTS46, $arr);
} else {

    $output = idn_to_utf8($domain);
}
```