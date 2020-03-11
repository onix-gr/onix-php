# PHP library for Onix.gr API

With this official Onix PHP library you can make use of [Onix](https://onix.gr/)'s API easily. The following methods are available.

  - Get the agency's information
  - Get the agency's reviews
  - Get a list of the agency's properties
  - Get the details of a specific property
  - Create a new property
  - Edit an existing property
  - Delete an existing property

## Installation

Onix-PHP requires PHP v5.6+ to run.

##### Composer

If you're using [Composer](http://getcomposer.org/), you can simply add a dependency on `onix-gr/onix-php` to your project's `composer.json` file. Here's an example of a dependency on version 1.0:

```json
{
    "require": {
        "onix-gr/onix-php": "^1.0"
    }
}
```

Alternatively you can also execute the following command in your project's root directory:

```
composer require onix-gr/onix-php
```

##### Git

If you already have git, the easiest way to download the Kraken-PHP library is with the git command:

```
git clone git://github.com/onix-gr/onix-php.git /path/to/include/onix
```

##### By Hand

Alternatively, you may download the PHP files from GitHub and place them within your PHP project:

```
https://github.com/onix-gr/onix-php/archive/master.zip
```

For production environments...

```sh
$ npm install --production
$ NODE_ENV=production node app
```

## Getting Started

First you need to obtain an  **API Key**. You can email support@onix.gr in order to get one. Each agency that uses Onix has a unique set of  **API Username** and **API Password**. They can find both under [API Credentials](https://panel.onix.gr/account/api-credentials).

### Authentication

The first step is to authenticate to Onix API by providing your unique API Key and the agency's API Username and API Password while creating a new Kraken instance:

````php
<?php
require_once("Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
````

## Language

By default, all response messages are in english. You can set them to Greek by calling the `onix.setLang()` method, including your desired language as a parameter:

````php
$onix->setLang('el');
````

## Get agency's information

To get all the information regarding the agency call the `onix.agencyInfo()` method:

````php
$response = $onix->agencyInfo();
````

`$response` will contain an array with the agency's information, its branches and brokers:

````php
Array
(
    [name] => Demo Real Estate
    [logo] => 
    [branches] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [type] => Main branch
                    [phone] => 2115888888
                    [email] => branch@demo.gr
                    [address] => Πόντου 58
                    [postal] => 89654
                    [city] => Αθήνα
                    [latitude] => 
                    [longitude] => 
                )
        )
    [members] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [first_name] => Πέτρος
                    [last_name] => Παπαδόπουλος
                    [email] => petros@demo.gr
                    [phone] => +306988888888
                    [image] => 
                )
        )
)
````

## Get agency's reviews

To get an array containing all the reviews of an agency, call the `onix.reviews()` method:

````php
$response = $onix->reviews();
````

`$response[reviews]` will contain an array with the agency's reviews. 
  - `total_reviews`: this is the total number of reviews.
  - `total_published_reviews`: this is the total number of published reviews.
  - `agency_rating`: this is the agency's average rating as shown on Onix.
  - `reviews`: an array containing all the reviews
  -- `first_name`: the reviewer's first name
  -- `last_name`: the reviewer's last name
  -- `date`: the date of the review at GMT+2
  -- `rating`: the rating from 1 to 5
  -- `broker_id`: if null, the review was left to the agency. It not null, it contains the id of the broker that was reviewed.
  -- `published`: If 1, the review is visible on Onix. If 0, the review is under moderation.

````php
Array
(
    [total_reviews] => 2
    [total_published_reviews] => 2
    [agency_rating] => 4.5
    [reviews] => Array
        (
            [0] => Array
                (
                    [id] => 2
                    [first_name] => James
                    [last_name] => Lisbon
                    [date] => 2019-11-02 10:37:08
                    [rating] => 5
                    [review] => 
                    [broker_id] => 
                    [published] => 1
                )
            [1] => Array
                (
                    [id] => 1
                    [first_name] => Γιώργος
                    [last_name] => Παπαδόπουλος
                    [date] => 2019-05-02 12:21:43
                    [rating] => 4
                    [review] => Πολύ καλές διαπραγματευτικές ικανότητες
                    [broker_id] => 1
                    [published] => 1
                )
        )
)
````

## Get the list of all the available property fields

You can call the `onix.propertyFields()` method to get a list of all the available fields that you can include in a property:

````php
$response = $onix->propertyFields();
````

`$response[available_fields]` will contain all the available fields.

````php
Array
(
    [status] => 200
    [message] => You can find all the available property fields below.
    [example_request_url] => https://api.onix.gr/v1/6bbf65481c867b15e22fe4e09f07e1f2/propertyFields/year
    [available_fields] => Array
        (
            [0] => branch_id
            [1] => broker_id
            [2] => listing_number
            [3] => purpose
            [4] => category
            [5] => subcategory
            [6] => latitude
            [7] => longitude
            [8] => location
            [9] => date_available
            [10] => size
            [11] => price
            [12] => photos
            [13] => air_conditioning
            [14] => airy
            [15] => alarm
            [16] => attic
            [17] => awning
            [18] => balcony
            [19] => bathrooms
            [20] => bedrooms
            [21] => bright
            [22] => building_ratio
            [23] => city_plan
            [24] => common_expenses
            [25] => corner
            [26] => dual_glazed
            [27] => electrical_devices
            [28] => elevator
            [29] => energy_class
            [30] => equipped
            [31] => facade
            [32] => fireplace
            [33] => floor_heat
            [34] => floor_material
            [35] => floor_number
            [36] => frames
            [37] => garden
            [38] => heating_fuel
            [39] => heating_type
            [40] => indoor_pool
            [41] => indoor_storage
            [42] => industrial_current
            [43] => instant_viewing
            [44] => internal_elevator
            [45] => internal_staircase
            [46] => investment
            [47] => kitchens
            [48] => last_floor
            [49] => levels
            [50] => living_rooms
            [51] => loft
            [52] => luxurious
            [53] => master_bedrooms
            [54] => neoclassic
            [55] => open_kitchens
            [56] => orientation
            [57] => outdoor_pool
            [58] => outdoor_storage
            [59] => painted
            [60] => parking
            [61] => parking_spots
            [62] => pellet
            [63] => penthouse
            [64] => pets
            [65] => preserved
            [66] => renovation_year
            [67] => requires_renovation
            [68] => sanitary_use
            [69] => screens
            [70] => security_door
            [71] => smokestack
            [72] => spaces
            [73] => structured_wiring
            [74] => three_face_current
            [75] => unfinished
            [76] => view_type
            [77] => wc
            [78] => year
        )
)
````
You can include a field's name as a parameter to the method in order to get information about a specific field:

````php
$response = $onix->propertyFields('year');
````

`$response` will contain all the details of the field. 
  - `name`: it contains a description of the field. 
  - `type`: it describes the type of the field. 
  - `dependances`: if not null, it contains an array with all the dependances of the field. For example, field `year` can only be used for residentrial and commercial properties. 
  - `accepted_values`: It can be an array or a string, describing the accepted values of the field. 
  - `required`: It can be either true of false. If true, this field is mandatory.

````php
Array
(
    [name] => Year of construction
    [type] => Integer number
    [dependances] => Array
        (
            [category] => Only used for categories with ID 1 or 2 (residential & commercial)
        )
    [accepted_values] => Integer number between 1700 and the current year or 0 for under construction property
    [required] => 
)
````

## Get existing properties

You can call the `onix.getProperties()` method to get a list of all the agency's properties:

````php
$response = $onix->getProperties();
````

`$response[properties]` will contain the ids of the agency's properties.

````php
Array
(
    [status] => 200
    [total_properties] => 5
    [properties] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => 4
            [4] => 5
        )
)
````
You can include the property's iD as a parameter to the method in order to get information about a specific property:

````php
$response = $onix->getProperty('4');
````

`$response` will contain all the details of the property. 
  - `date_created`: it contains the date that the property was created (GMT+2 timezone). 
  - `date_updated`: it contains the date that the property was last updated (GMT+2 timezone). 
  - `onix_id`: if not null, it contains the ID of the property at Onix.gr. Since many agencies create the same properties, all agencies' properties are merged info Onix's properties. If the onix_id is null, it means that this property is still under moderation.
  - `status`: the status of the property. 
  - `All the rest keys`: they contain the values of the fields. You can find more information about each field using the onix.PropertyFields() method.

````php
Array
(
    [id] => 4
    [date_created] => 2020-02-23 22:02:19
    [date_updated] => 2020-02-23 22:15:03
    [onix_id] => 94
    [status] => Published
    [branch_id] => 1
    [broker_id] => 
    [listing_number] => 
    [purpose] => 1
    [category] => 1
    [subcategory] => 11
    [location] => Θεσσαλονίκη, κέντρο
    [date_available] => 2020-01-14
    [latitude] => 40.636101528180916
    [longitude] => 22.952156066894535
    [size] => 50
    [price] => 60000
    [photos] => Array
        (
            [0] => https://static.onix.gr/properties/photos/2020/02/5e52bd7e32dbf1582480766.webp
            [1] => https://static.onix.gr/properties/photos/2020/02/5e52bd7f405051582480767.webp
        )
    [floor_number] => 2
    [levels] => 1
    [bedrooms] => 4
    [alarm] => 1
    [air_conditioning] => 0
    [loft] => 0
    [awning] => 0
    [balcony] => 0
    [bright] => 0
    [dual_glazed] => 0
    [elevator] => 0
    [fireplace] => 0
    [floor_heat] => 0
    [garden] => 0
    [indoor_pool] => 0
    [outdoor_pool] => 0
    [indoor_storage] => 0
    [outdoor_storage] => 0
    [internal_elevator] => 0
    [last_floor] => 0
    [luxurious] => 0
    [neoclassic] => 0
    [painted] => 0
    [parking] => 0
    [preserved] => 0
    [requires_renovation] => 0
    [screens] => 0
    [security_door] => 0
    [smokestack] => 0
    [structured_wiring] => 0
    [three_face_current] => 0
    [unfinished] => 0
    [investment] => 0
    [attic] => 0
    [electrical_devices] => 0
    [pellet] => 0
    [penthouse] => 0
    [airy] => 0
    [corner] => 0
    [facade] => 0
    [instant_viewing] => 0
)
````

## Create a new property

You can call the `onix.createProperty()` method, passing all the property's fields as an array:

````php
$data = array(
	"purpose" => 1, 
	"category" => 1, 
	"subcategory" => 11, 
	"location" => "Θεσσαλονίκη, κέντρο", 
	"latitude" => "40.636101528180916",
	"longitude" => "22.952156066894535",
	"size" => 60,
	"price" => 600,
	"date_available" => "2020-01-14",
	"branch_id" => 1,
	"floor_number" => 2,
	"levels" => 1,
	"bedrooms" => 4,
	"alarm" => 1
);
$response = $onix->createProperty($data);
````

`$response` will contain the status and the property's ID.

````php
Array
(
    [status] => 200
    [message] => The property as been added and is under moderation.
    [property_id] => 10
    [ip] => 188.117.225.12
)
````
If a field is missing or is invalid, you will receive the appropriate error. For example, if you remove the `size` field from the data array, you will receive this response:

````php
Array
(
    [status] => 505
    [message] => A required field is missing.
    [data_missing] => size
    [documentation] => https://api.onix.gr/v1/<your-api-key>/propertyFields/size
)
````

## Edit an existing property

You can call the `onix.editProperty()` method, passing the property's ID and an array containing all the property's fields that you want to change:

````php
$property_id = 4;
$data = array(
	"size" => 55
);
$response = $onix->editProperty($property_id, $data);
````

`$response` will contain the result. If the property is under aproval, the edit will be auto applied. If the property already has an Onix ID, then the changes will be under moderation.

````php
Array
(
    [status] => 200
    [message] => We have received your request and we will check the provided info.
    [ip] => 188.117.225.12
)
````

## Delete an existing property

You can call the `onix.deleteProperty()` method, passing the property's ID and an argument:

````php
$property_id = 4;
$response = $onix->deleteProperty($property_id);
````

`$response` will contain the request status.

````php
Array
(
    [status] => 200
    [message] => Property has been deleted.
)
````
## More examples
You can find detailed examples at the project's [examples folder](https://github.com/onix-gr/onix-php/tree/master/examples).

## License - MIT

MIT License

Copyright (c) 2020 ONIX

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
