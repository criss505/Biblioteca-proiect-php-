<?php
    // $curl=curl_init();
    // $url="https://www.librarie.net/cautare-rezultate.php?cat=58";
    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $result=curl_exec($curl);

    // $books = array();

    // preg_match_all('/<div class="css_product_grid">(.*)<\/div>/sU', $result, $matches);
    // $books['title'] = $matches[1];
    // $books['author'] = $matches[1];
    // $books['price'] = $matches[1];
    // $books['image'] = $matches[1];
    // $books['link'] = $matches[1];


    // $dom = new DOMDocument();
    // @$dom->loadHTML($result);
    // $xpath = new DOMXPath($dom);
    // $nodes = $xpath->query('//div[@class="book"]');


    // foreach ($books as $node) {
    //     $book = array();
    //     $book['title'] = $node->getElementsByTagName('h2')->item(0)->nodeValue;
    //     $book['author'] = $node->getElementsByTagName('h3')->item(0)->nodeValue;
    //     $book['price'] = $node->getElementsByTagName('span')->item(0)->nodeValue;
    //     $book['image'] = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
    //     $book['link'] = $node->getElementsByTagName('a')->item(0)->getAttribute('href');
    //     $books[] = $book;
    // }

    // foreach ($books as $book) {
    //     echo $book['title'] . ' - ' . $book['author'] . ' - ' . $book['price'] . ' - ' . $book['image'] . ' - ' . $book['link'] . '';
    // }

    
    // curl_close($curl);
    // echo $result;

?>


<?php
    // $curl=curl_init();
    // $url="https://www.librarie.net/cautare-rezultate.php?cat=58";
    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $result=curl_exec($curl);

    // $books=array();

    // //match movie title
    // preg_match_all('!<a href="\/title\/.*?\/\?ref_=adv_li_tt"\n>(.*?)<\/a>!',$result,$match);
    // preg_match_all('!<a href="\/title\/',$result,$match);
    // $books['title']=$match[1];

    // //match movie year
    // preg_match_all('!<span class="lister-item-year text-muted unbold">\n(.*?)<\/span>!',$result,$match);
    // $movies['year']=$match[1];

    // //match image url
    // preg_match_all('!<img src="(.*?)" class="loadlate"!',$result,$match);
    // $movies['image']=$match[1];

    // //match movie rating
    // preg_match_all('!<div class="inline-block ratings-imdb-rating" data-value="(.*?)" name="ir">!',$result,$match);
    // $movies['rating']=$match[1];

    // // print("<pre>".print_r($movies,true)."</pre>");
    // // print_r($movies);

    // for($i=0;$i<count($movies['title']);$i++){
    //     echo $movies['title'][$i].'<br>';
    //     // echo $movies['year'][$i].'<br>';
    //     // echo $movies['image'][$i].'<br>';
    //     // echo $movies['rating'][$i].'<br>';
    //     echo 'an';
    //     echo 'rating'.'<br>';
    // }


    // _______________________functia


function scrapeRating($title, $author) {
    $title = str_replace(' ', '+', $title . ' - ' . $author);

    // url of the search query
    $url = "https://www.goodreads.com/search?utf8=%E2%9C%93&query=$title";

    $html = file_get_contents($url);

    $start = stripos($html, 'class="bookTitle"');
    
    if($start === false) {
        return [
            'page' => $url,
            'rating' => 'N/A'
        ];
    }

    $end = stripos($html, '>', $offset = $start);
    $length = $end - $start;

    $substring = substr($html, $start, $length);

    $book_url_start = stripos($substring, "href=") + 6;
    $book_url_end = stripos($substring, '"', $offset = $book_url_start);
    $book_url_length = $book_url_end - $book_url_start;

    // the actual url of the book
    $book_url = 'https://www.goodreads.com'.substr($substring, $book_url_start, $book_url_length);

    $book_page = file_get_contents($book_url);

    // the div in the page with the rating and other stuff
    $rating_div_start = stripos($book_page, '<div id="bookMeta"');
    $rating_div_end = stripos($book_page, '</div>', $offset = $rating_div_start) + 6;
    $rating_div_length = $rating_div_end - $rating_div_start;

    $rating_div = substr($book_page, $rating_div_start, $rating_div_length);

    // the actual rating number
    $rating_number_start = stripos($rating_div, 'itemprop="ratingValue"') + 23;
    $rating_number_end = stripos($rating_div, '</span>', $offset = $rating_number_start);
    $rating_number_length = $rating_number_end - $rating_number_start;

    $rating = substr($rating_div, $rating_number_start, $rating_number_length);

    return [
        'page' => $book_url,
        'rating' => $rating
    ];

}
// echo scrapeRating('On The Origin Of Species')['rating'];

