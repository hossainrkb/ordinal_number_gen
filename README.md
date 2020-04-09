# Ordinal Number conversion from any valid Number and String

  - This package has converted any valid number and string to it's ordinal number.

# Installation

use composer require rkb/convert_to_ordinal to install

# Usage

```sh
include './vendor/autoload.php';

$data = new App\OrdinalNumber();

$value = 1441;

$value = "4    4,4,55,55,1441";

echo ($data->ordinal_convert($value));
```

# Output

```sh
     "1st",
     "2nd",
     "3rd",
     "4th",
     "5th",
     "6th",
     "7th",
     "8th",
     "9th",
     "10th",
```


