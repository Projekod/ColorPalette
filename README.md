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

**return array** :

<pre>
Array
(
    [0] => 660099
    [1] => FFCC66
    [2] => 9966FF
    [3] => 336633
    [4] => CCFFFF
    [5] => 6666FF
    [6] => 6633CC
    [7] => CC66FF
    [8] => 33CC99
    [9] => FFCC33
    [10] => 33CC66
    [11] => 339966
    [12] => FF9966
    [13] => FF9933
    [14] => FFFF66
    [15] => 663399
    [16] => FF3399
    [17] => 6666CC
    [18] => FFFFFF
    [19] => 9933CC
    [20] => 333333
    [21] => FF9999
    [22] => FF3366
    [23] => FF66CC
    [24] => 99FFFF
    [25] => 339933
    [26] => 009933
    [27] => FF6666
    [28] => 660066
    [29] => 6699FF
)
</pre>

**Test image ** : ![colorPalette Test img]()