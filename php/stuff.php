<?php
    $test = '{
 "kind": "books#volumes",
 "totalItems": 1,
 "items": [
  {
   "kind": "books#volume",
   "id": "Jx1ojwEACAAJ",
   "etag": "9AwxlvbXsBg",
   "selfLink": "https://www.googleapis.com/books/v1/volumes/Jx1ojwEACAAJ",
   "volumeInfo": {
    "title": "Harry Potter and the Cursed Child - Parts I & II (Special Rehearsal Edition): The Official Script Book of the Original West End Production",
    "authors": [
     "J. K. Rowling",
     "Jack Thorne",
     "John Tiffany"
    ],
    "publisher": "Arthur A. Levine Books",
    "publishedDate": "2016-07-31",
    "description": "Seashells, sand castles, waves, and sun! A day at the beach has never been more fun.",
    "industryIdentifiers": [
     {
      "type": "ISBN_10",
      "identifier": "1338099132"
     },
     {
      "type": "ISBN_13",
      "identifier": "9781338099133"
     }
    ],
    "readingModes": {
     "text": false,
     "image": false
    },
    "pageCount": 320,
    "printType": "BOOK",
    "categories": [
     "Juvenile Nonfiction"
    ],
    "maturityRating": "NOT_MATURE",
    "allowAnonLogging": false,
    "contentVersion": "preview-1.0.0",
    "imageLinks": {
     "smallThumbnail": "http://books.google.com/books/content?id=Jx1ojwEACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api",
     "thumbnail": "http://books.google.com/books/content?id=Jx1ojwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api"
    },
    "language": "en",
    "previewLink": "http://books.google.com/books?id=Jx1ojwEACAAJ&dq=isbn:1338099132&hl=&cd=1&source=gbs_api",
    "infoLink": "http://books.google.com/books?id=Jx1ojwEACAAJ&dq=isbn:1338099132&hl=&source=gbs_api",
    "canonicalVolumeLink": "http://books.google.com/books/about/Harry_Potter_and_the_Cursed_Child_Parts.html?hl=&id=Jx1ojwEACAAJ"
   },
   "saleInfo": {
    "country": "US",
    "saleability": "NOT_FOR_SALE",
    "isEbook": false
   },
   "accessInfo": {
    "country": "US",
    "viewability": "NO_PAGES",
    "embeddable": false,
    "publicDomain": false,
    "textToSpeechPermission": "ALLOWED",
    "epub": {
     "isAvailable": false
    },
    "pdf": {
     "isAvailable": false
    },
    "webReaderLink": "http://books.google.com/books/reader?id=Jx1ojwEACAAJ&hl=&printsec=frontcover&output=reader&source=gbs_api",
    "accessViewStatus": "NONE",
    "quoteSharingAllowed": false
   },
   "searchInfo": {
    "textSnippet": "Seashells, sand castles, waves, and sun! A day at the beach has never been more fun."
   }
  }
 ]
}';

$res = json_encode($test);
echo $res;