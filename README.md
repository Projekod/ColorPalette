# Color Palette&nbsp;

Makes color palette from a picture.

**usage** :

<pre>
$pkc = new pk_color();
$palette = $pkc->setGranularity(10)
    ->setPicture("test.jpg")
    ->setColorsCount(30)
    ->getIt();
</pre>