@extends('front.layout.default')
@section('meta_nofollow')

<?php 
$action_slug1 = request()->segment(count(request()->segments())-1);
$action_slug2 = request()->segment(count(request()->segments())-1);
$action_slug3 = request()->segment(count(request()->segments())-0);

if( $action_slug2 == "infographic")
{
?>
<meta name="robots" content="noindex">
<?php
}

if($action_slug1 != "industry-report" && $action_slug2 != "infographic")
{
    ?>
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <?php
   
}
?>
@stop

@section('faq_script')
@foreach($report_data as $data)
@if($action_slug1 == "industry-report")
@if($action_slug3 == "india-refrigerator-market")
</script>
	<script type="application/ld+json">
    {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": 	"India Refrigerator Market - Industry Dynamics, Market Size, And Opportunity Forecast To 2027",
            "image": "https://www.astuteanalytica.com/industry-report/india-refrigerator-market",
            "sku" : "AA0121026",
            "mpn": "AA0121026",
			"Category": "Consumer Goods",
            "description": "#Snapshot img { margin: 10px !important; } Report Synopsis
As per the research study, the India Refrigerator Market is anticipated to account a growth at a CAGR of 8.1% during the forecast period 2021-2027. The revenue generated from the sales of refrigerators in India witnessed a growth to US$ 6,900 million by the end of the year 2027. The refrigerator market in India is increasing due to improving living standards coupled with rising disposable income and technological advancements contributing to increased convenience at low prices.
Smart refrigerators are highly in demand due to rising demand for environmentally friendly refrigeration products and power efficient freezers in India.
A detailed analysis of the India refrigerator market includes an assessment of the emerging market trends by segments and various micro and macro-economic factors that are significantly changing the overall market dynamics for the forecast period. The report detailed an analysis of the India refrigerators market for the period 2017 to 2027, wherein 2017-2019 is the historic data, 2020 is considered as the base year and 2021-2027 is the forecast period.
The 150 pages report on India refrigerator market offers detailed analysis of market opportunities, market dynamics, and industry competitive structure and other major market determinants elucidated across 12 chapters.
The research report covers in-depth analysis of market traits, country breakdowns, segmentation, growth, competitive landscape and strategies and recent market trends of this market. The study traces historic and forecast data of the market within the context of India refrigerator market. The analysis part include comparison with other market segments, market definition, sales and revenue, regional market opportunity, industrial chain, and manufacturing cost analysis with detailed factor analysis.
The research report presents market size forecast and related data in the form of graphs, bar & pie charts, tables, and statistics with quantitative insights on business intelligence.
Report Scope
The report provides comprehensive analysis for market opportunities in refrigerator industry in India. The regions that are extensively analyzed are North India, South India, East India and West India. As per the studies, South India accounted for highest shareholding in both value and volume terms for the year 2020; with Tamilnadu contributing majorly to the dominance of regions. East India is estimated to grow at a fastest CAGR of 8.6% in the India refrigerator market during the forecast period, with Odisha leading the way in the demand of refrigerators for the forecast period.
The segment analysis section of the India refrigerator market report includes study of the market basis of following parameters – Model Type, Retail Format, Capacity, Technology and End User. These key market segments have been studied in detail along with 17 sub-segments, offering reading with exclusive and detailed insights of the marketplace.
Impact Assessment of COVID-19
This section in the research study of the India refrigerator market includes identification and investigation of the following parameters: Overall Market Structure, Supply Chain and Value Chain, Short-term Market Determinants, Emerging Product Trends & Upcoming Market Opportunities. This analytical piece of research study also inspects the financial standing of major key companies along with individual growth rate, and other financial ratios.
Report Glimpse
Growing urbanization due to high disposable income in the country is estimated to be the major factor for the growth of the refrigerator market in India. Indian cities contribute to about 2/3 of the economic output, host a growing share of the population and are the main recipients of FDI and the originators of innovation and technology and over the next two decades are projected to have an increase of population from 282 million to 590 million people. Cities and towns in India have expanded rapidly as increasing numbers migrate to cities and towns in search of economic opportunity and improved lifestyle.
Growing urbanization will augment the demand for improved infrastructure in almost all applications ranging from residential to commercial applications. Moreover, in homes, connected devices are likely to transform the consumption behavior of consumers over the forecast period. The increasing urban population creates demand for refrigerator systems and therefore, it is estimated to augment the market growth in the region.
Intensity of competition in the India Refrigerator Market
The competitive landscape section of India refrigerator market research report covers detailed company profiling of 14 key companies and scope is not limited to listed companies only, readers can ask for customization and revised list of market players according to their requirements.
The company profile section includes various categories to include detail about companies under the head of Business Description, Strategy Outlook, Product Portfolio, Financial Performance, Business and Regional Segments and Recent Developments. The companies profiled in the research report are Blue Star Limited, Croma, Electrolux AB, Godrej Group, Haier Group Corp., Hitachi Ltd., LG Electronics Inc., Liebherr-International Deutschland GmbH, Panasonic Corp., Robert Bosch GmbH, Samsung Electronics Co., Ltd., Tropicool India, Voltas, Inc. and Whirlpool Corp.
Segmentation Overview of the India Refrigerator Market
By Model Type
Mini Freezers
Top Freezer
Bottom Freezer
Side by Side
French Door
Merchandizers
By Retail Format
Online
E-commerce
Brand
Offline
Specialty Stores
Brand Stores
By Capacity
<200 L 200 – 499 L 500 – 700 L> 700 L
By Technology
Smart (Frost Free)
Conventional (Direct Cool)
By End User
Residential
Commercials (HoReCa)
Restaurants & café
Hotels
Hospitals & Pharmacies
Others (Education, Enterprises)
By Region/ City
North India
Uttar Pradesh
Delhi
Haryana
Rajasthan
Punjab
Himachal
J&K
South India
Tamil Nadu
Kerala
Karnataka
Andhra Pradesh
Telangana
West India
Gujarat
Goa
Madhya Pradesh
Maharashtra
Chhattisgarh
East India
West Bengal
Bihar
Assam
Jharkhand
Odisha
Rest of East India",
            "productID": "AA0121026",
            "brand": 
            {
                    "@type": "Organization",
                    "legalName": "Astute Analytica"
            },
            "review": 
                {
                    "@type": "Review",
                    "reviewRating": 
                    {
                            "@type": "Rating",
                            "ratingValue": "4.6",
                            "bestRating": "5"
                    },
                    "author": 
                    {
                            "@type": "Organization",
                            "name": "Astute Analytica"
                    }
                },

            "aggregateRating": 
                {
                            "@type": "AggregateRating",
                            "ratingValue": "4.6",
                            "reviewCount": "25"
                },
  "offers": 
    {
      "@type": "Offer",
      "url": "https://www.astuteanalytica.com/industry-report/india-refrigerator-market",
      "priceCurrency": "USD",
      "price": "2200",
      "priceValidUntil": "2021/12/31",
      "itemCondition": "https://schema.org/NewCondition",
      "availability": "https://schema.org/InStock",
      "seller": {
     		 "@type": "Organization",
      		"name": "Astute Analytica"
    		}
                        
    }
}
</script>
@endif

<!-- dataset schema -->

<script type="application/ld+json">
	{
      "@context":"https://schema.org/",
      "@type":"Dataset",
      "name":"{{$page_title}}",
      "description":"{{$meta_description}}",
      "url":"https://www.astuteanalytica.com/industry-report/{{$data->report_slug}}",
	  "spatialCoverage": "Worldwide",
	  "temporalCoverage":"",
      "keywords": "",
	   "creator": {
				"@type": "Organization",
				"url": "https://www.astuteanalytica.com/",
				"name": "Astute Analytica",
				"logo": {
                "@type": "ImageObject",
                "url": "https://www.astuteanalytica.com/public/front/images/logo/logo-2.png"
				}
				
			},
			"license":
			{
				"@type":"CreativeWork",
				"name":"Astute Analytica",
				"url":"https://www.astuteanalytica.com/privacy-policy"
			}
    }
</script>


<!-- webpage schema -->

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "{{$data->report_title_h2}}"
    }
</script>

<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@type": "WebPage",
                    "@id": "https://www.astuteanalytica.com/",
                    "name": "Home"
                }
            },
            {
                "@type": "ListItem",
                "position": 2,
                "item": {
                    "@type": "WebPage",
                    "@id": "https://www.astuteanalytica.com/industry/{{$cate_slug}}",
                    "name": "Industry"
                }
            },
            {
                "@type": "ListItem",
                "position": 3,
                "item": {
                    "@type": "WebPage",
                    "@id": "{{Request::url()}}",
                    "name": "{{$data->report_title}}"

                }

            }
        ]
    }

</script>
@if($data->upcoming == "NO")

@if(!$faq_data->isEmpty())
<?php 
$x = sizeof($faq_data);
$im = 1; 
?>




<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @foreach($faq_data as $fq)
        
        {
        "@type": "Question",
        "name": "{{$fq->title}}",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "<?php echo $fq->description;?> <a href='{{Request::url()}}'>Read More</a>"
        }
        }@if($im != $x),@endif
       
        <?php $im++;?>
        @endforeach
      
      ]
    }
</script>
@endif
@endif
@endif
@endforeach

@stop

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="preload" href="{{ URL::asset('public/front/css/report.css?ver=3.1') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/report.css?ver=3.1') }}"></noscript>
<style>
    .imgSsas {
    height: 400px;
    overflow: hidden;
}
.signle-services-item img {
    width: 100%;
    margin: 15px 0;
}
.fullViewA {
    position: absolute;
    top: 0;
    width: 100%;
    height: 400px;
    justify-content: center;
    display: flex;
    place-items: center;
    background: #0000004a;
    color: #fff;
    cursor: pointer;
}
h3 {
    font-weight: 500;
    font-size: 23px;
}
    .toc-description li, .toc-description ol ul{
       list-style : disc!important;
       color:#000;
    }
    .toc-description p{
        text-align:justify
    }
    
    .toc-description h3 {
        line-height: 28px;
        font-size:16px;
        font-weight: 400;
        font-family: Roboto, sans-serif;
        color: #000;
    }
                                            
</style>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script>
    function playNow(str) {
        responsiveVoice.speak(str, 'UK English Male');
        $('#play_bt').html("<label onclick='pauseNow()' style='text-transform: capitalize;'>Pause </label>");
    }
    function pauseNow()
    {
        responsiveVoice.pause();
        $('#play_bt').html("<label onclick='resume()' style='text-transform: capitalize;'>Resume </label>");
    }
    function resume()
    {
        responsiveVoice.resume();
        $('#play_bt').html("<label onclick='pauseNow()' style='text-transform: capitalize;'>Pause </label>");
    }
    function validate_form()
    {
    valid = true;
    
    if($('input[type=checkbox]:checked').length == 0)
    {
        alert ( "ERROR! Please select at least one section of report" );
        valid = false;
    }
    
    return valid;
    }
    
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".play-pause").click(function() {
      $(this).toggleClass("paused");
    });
    
  });      
</script>

<script src="https://dosrg0qttcg52.cloudfront.net/js/Chart.min.js"></script>
    <script src="https://dosrg0qttcg52.cloudfront.net/js/outlabels.js"></script>
    <script src="https://dosrg0qttcg52.cloudfront.net/js/chart_plugin.js"></script>
     
@foreach($report_data as $data)
<?php $slu_report = $data->report_slug;?>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                
                <h1 class="page-title-heading"><?php echo $data->report_title;?></h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li><a href="{{url('/industry')}}/{{$cate_slug}}">{{$cate_title}}</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>
                        <?php 
                        $dt = $data->report_slug;
                        $var = str_replace('-', ' ', $dt);
                        ?>
                        <div style="font-size: 14px; !important">
                        {{$var}}
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div id="service" class="single-services fixed-container services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8  order-first mb-30">

                <div class="container-service-details">
                    <div class="signle-services-item">
                        <div class="title-single-service">
                            <h2 class="mb-10">{{$data->report_title_h2}} 
                            @if($data->update_availiable == "1")
                                 <a href="{{url('request-sample',$data->report_slug)}}" class="btn btn-update ">Updated Report Available</a>
                                @endif
                            </h2>
                            <div class="row">
                                <div class="col-lg-9 pr-0 mr-0">
                                    <ul class="date mb-30">
                                        <li style="margin-right:0px !important">
                                        @if($data->upcoming == "NO")
                                            Published Date:
                                            <?php
                                                $date = $data->publish_date; 
                                                $date=date_create($date);
                                                echo date_format($date,"d-M-Y");
                                            ?>
                                            &nbsp;| &nbsp;
                                        @else
                                            Published Date: Upcoming  |  
                                            <!--Publication Date: -->
                                            <?php
                                             
                                            //  echo date('M-Y', strtotime('+3 months'));
                                            ?>
                                        @endif
                                    
                                    Format: @if($data->pdf != "")<img class="lazyload" data-src="{{URL::asset('public/front/images/pdf.webp')}}" alt="pdf">@endif @if($data->ppt != "")<img class="lazyload" data-src="{{URL::asset('public/front/images/powerpoint.png')}}" alt="powerpoint"> @endif
                                            @if($data->web_formate != "")<img class="lazyload" data-src="{{URL::asset('public/front/images/powerpoint.webp')}}" alt="powerpoint"> @endif
                                            @if($data->excel != "")<img class="lazyload" data-src="{{URL::asset('public/front/images/excel.webp')}}" alt="excel">@endif &nbsp;| &nbsp;Report ID: {{$data->report_id}} &nbsp;|
                                            @if($data->upcoming == "NO")
                                            <i class="far fa-folder-open"></i> Delivery: {{$data->delivery}}
                                            @endif
                                            </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 upper-bar social-bar">
                                    <ul class="social-media-bar">
                                        <li><a href="https://www.facebook.com/sharer.php?u={{ url('/industry-report/' .$data->report_slug) }}?count=no" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/share?mini=true&url={{ url('/industry-report/' .$data->report_slug) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{url('/industry-report/' .$data->report_slug)}}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                        <?php 
                            $action_slug = request()->segment(count(request()->segments())-1);
                            if($action_slug == "industry-report")
                            {
                                $des_action = "active";
                            }
                            else
                            {
                                $des_action = "";
                            }
                            if($action_slug == "toc")
                            {
                                $toc_action = "active";
                            }
                            else
                            {
                                $toc_action = "";
                            }
                            if($action_slug == "segmentation")
                            {
                                $segmentation_action = "active";
                            }
                            else
                            {
                                $segmentation_action = "";
                            }
                            if($action_slug == "methodology")
                            {
                                $methodology_action = "active";
                            }
                            else
                            {
                                $methodology_action = "";
                            }
                            if($action_slug == "lot")
                            {
                                $lot_action = "active";
                            }
                            else
                            {
                                $lot_action = "";
                            }
                            if($action_slug == "infographics")
                            {
                                $infographics_action = "active";
                            }
                            else
                            {
                                $infographics_action = "";
                            }
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <?php 
                                $url_segment = Request::url();
                               
                                ?>

                                <div class="mobBLo my-2">
                                    <select  class="mb-0 bordRed12" onchange="location = this.value;">
                                         <option value="{{url('industry-report',$data->report_slug)}}">Summary</option>
                                           @if(!$toc_data->isEmpty())
                                         <option value="{{url('industry-report/toc',$data->report_slug)}}">Table of Content</option>
                                          @else
                                         <option value="{{url('request-toc',$data->report_slug)}}">Table of Content</option>
                                          @endif
                                            
                                            @if($data->list_of_tables!="" || $data->list_of_figure!="")
                                          <option value="{{url('industry-report/lot',$data->report_slug)}}">List Of Table / Figure</option>
                                           @endif
                                        @if($data->market_sagment != "")
                                          <option value="{{url('industry-report/segmentation',$data->report_slug)}}">Segmentation</option>
                                        @endif
                                        @if($data->methodology != "")
                                         <option value="{{url('industry-report/methodology',$data->report_slug)}}">Methodology</option>
                                        @else
                                            <option value="{{url('request-methodology',$data->report_slug)}}">Methodology</option>
                                        @endif
                                        @if($data->infographics != "")
                                            <option value="{{url('industry-report/infographic',$data->report_slug)}}">Infographic</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="my-account-page header dskTOP">
                                    <ul class="nav-tabs-main">
                                        <li class="{{$des_action}}">
                                            <a href="{{url('industry-report',$data->report_slug)}}">
                                                <h5 class="">Summary  </h5>
                                            </a>
                                        </li>
                                        @if(!$toc_data->isEmpty())
                                        <li class="{{$toc_action}}">
                                            <a href="{{url('industry-report/toc',$data->report_slug)}}">
                                                <h5 class="">Table of Content</h5>
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                        <a href="{{url('request-toc',$data->report_slug)}}">
                                                <h5 class="">Table of Content</h5>
                                            </a>
                                        </li>
                                        @endif
                                        
                                        @if($data->list_of_tables!="" || $data->list_of_figure!="")
                                            <li class="{{$lot_action}}">
                                                <a href="{{url('industry-report/lot',$data->report_slug)}}">
                                                    <h5 class="">List Of Table / Figure</h5>
                                                </a>
                                            </li>
                                       
                                        @endif
                                        
                                        
                                        
                                        @if($data->market_sagment != "")
                                        <li class="{{$segmentation_action}}">
                                            <a href="{{url('industry-report/segmentation',$data->report_slug)}}">
                                                <h5 class="">Segmentation</h5>
                                            </a>
                                        </li>
                                        
                                        @endif
                                        @if($data->methodology != "")
                                        <li class="{{$methodology_action}}">
                                            <a href="{{url('industry-report/methodology',$data->report_slug)}}">
                                                <h5 class="">Methodology</h5>
                                            </a>
                                        </li>
                                        @else
                                        <li class="">
                                            <a href="{{url('request-methodology',$data->report_slug)}}">
                                                <h5 class="">Methodology</h5>
                                            </a>
                                        </li>
                                        @endif
                                        @if($data->infographics != "")
                                        
                                        
                                        <li class="{{$infographics_action}}">
                                            <a href="{{url('industry-report/infographic',$data->report_slug)}}">
                                                <h5 class="">Infographic</h5>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <h5><a href="{{url('request-sample',$data->report_slug)}}" class="btn-three d-n-mobile">Request a FREE Sample Copy</a></h5>
                                        </li>
                                    </ul>

                                </div>
                              
                                 @if($action_slug == "infographic")
                                 
                                    <style>
                                        
                                        .my-account
                                        {
                                            border:0px solid #eee !important;
                                        }
                                    </style>
                                 @else
                                 <style>
                                    
                                        .my-account
                                        {
                                            border:1px solid #eee; !important;
                                        }
                                    </style>
                                 @endif


                                                               

                                <div class="my-account toc-description most_seen " >
                                    @if($action_slug == "industry-report")
                                     <?php echo $data->report_description_1; ?>
                                    <?php
                                        if(!empty($data->bargraph_x))
                                        {
                                            ?>
                                            <input type="hidden" id="bargraph_x" value="<?php echo $data->bargraph_x; ?>">
                                            <input type="hidden" id="bargraph_y" value="<?php echo $data->bargraph_y; ?>">
                                            <input type="hidden" id="bargraph_fake" value="<?php echo $data->bargraph_fake; ?>">
                                            <input type="hidden" id="bargraph_text" value="<?php echo $data->bargraph_text; ?>">
                                            <canvas id="myChart" style="margin:auto;width:100%;max-width:800px"></canvas>
                                            <pre class="text-center" style="font-size:14px;"><b>To Get more Insights, <a class="btn btn-danger text-white" style="border-radius:6px;" href="{{url('request-sample',$data->report_slug)}}" target="_blank"> Request A Free Sample </a></b> </pre>
                                            <?php
                                        }
                                        
                                    ?>                                    
                                    <?php echo $data->report_description_2; ?>
                                    <?php
                                        if(!empty($data->piechart_x))
                                        {
                                            ?>
                                                <input type="hidden" id="piechart_x" value="<?php echo $data->piechart_x; ?>">
                                                <input type="hidden" id="piechart_y" value="<?php echo $data->piechart_y; ?>">
                                                <input type="hidden" id="piechart_fake" value="<?php echo $data->piechart_fake; ?>">
                                                <input type="hidden" id="piechart_color" value="<?php echo $data->piechart_color; ?>">
                                                <input type="hidden" id="piechart_text" value="<?php echo $data->piechart_text; ?>">
                                                <canvas id="myChart1" style="margin:auto;width:100%;max-width:1000px"></canvas>
                                                <pre class="text-center" style="font-size:14px;"><b> To Understand More About this Research: <a class="btn btn-danger text-white" style="border-radius:6px;" href="{{url('request-sample',$data->report_slug)}}" target="_blank"> Request A Free Sample </a></b> </pre>

                                            <?php
                                        }
                                    ?>
                                  
                                    <?php echo $data->report_description_3; ?>
                                    
                                    
                                    
                                    <!--TEXT HERE-->
                                    
                                    
                                    @elseif($action_slug == "toc")
                                    <div class="table">
                                        <form action="{{url('toc_section_buy')}}" method="post" onsubmit="return validate_form();">
                                            @csrf
                                        <div class="signle-services-item faq">
                                            <div id="accordion" class="accordion">
                                                <?php $i=1; ?>
                                                @foreach($toc_data as $toc)
                                                <div class="card @if($i==1)  @endif">
                                                    <div class="card-header" id="heading{{$toc->toc_id}}">
                                                        <h5 class="mb-0">
                                                            <div class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$toc->toc_id}}" aria-expanded="false" aria-controls="collapseOne">
                                                              
                                                                <span>
                                                                <input type="checkbox" name="toc_section[]" value="{{$toc->toc_id}}">
                                                                &nbsp;{{$toc->title}}</span>
                                                               
                                                                <div class="float-right mr-3 amaout-sec font-weight-bold">$ {{$toc->amount}}</div>
                                                            </div>
                                                        </h5>
                                                    </div>

                                                    <div id="collapse{{$toc->toc_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$toc->toc_id}}" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <?php echo $toc->description ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i++;?>
                                                @endforeach
                                            </div>
                                            <input type="hidden" name="all_reports_id" value="{{$data->all_reports_id}}">
                                            <button type="submit" class="main-btn-two mt-3" style="border: 0;">
                                
                                                <div class="text-btn">
                                                    
                                                     <span class="text-btn-one">Buy Section of Report</span>
                                                    <span class="text-btn-two">Buy Section of Report</span>
                                                   
                                                </div>
                                                <div class="arrow-btn">
                                                    <span class="arrow-one"><i class="fa fa-shopping-cart"></i></span>
                                                    <span class="arrow-two"><i class="fa fa-shopping-cart"></i></span>
                                                </div>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                    

                                    @elseif($action_slug == "lot")
                                    <b class="font-weight-bold mt-3"><u>List Of Table</u></b>
                                    <?php echo $data->list_of_tables; ?>
                                   
                                    <b class="font-weight-bold mt-3"><u>List Of Figure</u></b>
                                    <?php echo $data->list_of_figure; ?>
                                    

                                    @elseif($action_slug == "segmentation")
                                    <?php echo $data->market_sagment; ?>
                                    @elseif($action_slug == "methodology")
                                    <?php echo $data->methodology; ?>
                                    @elseif($action_slug == "infographic")
                                   
                                    <b class="mt-3"><u><span class="text-dark">INFOGRAPHIC: </span></u></b>
                                    <img class="lazyload" data-src="{{ 'https://d1ldvpqox0v0p3.cloudfront.net/upload/report/' .$data->infographics }}" width="100%" alt="{{$data->alt_tag}}">
                                    @else
                                    <?php echo $data->report_description_1; ?>
                                    <?php echo $data->report_description_2; ?>
                                    <?php echo $data->report_description_3; ?>
                                    @endif

                                </div>


                                @if($data->infographics && $action_slug == "industry-report")
                                
                                  <b class="mt-3"><u><span class="text-dark">INFOGRAPHIC: </span></u></b>
                                    <div class="position-relative imgSsas">
                                        <img class="mt-0 lazyload" data-src="{{ 'https://d1ldvpqox0v0p3.cloudfront.net/upload/report/' .$data->infographics }}" width="100%" alt="{{$data->alt_tag}}" width="100%" alt="{{$data->alt_tag}}" >
                                        <div class="fullViewA" data-toggle="modal" data-target="#exampleModalInfographic">
                                            <h3><i class="fas fa-search-plus"></i> View Full Infographic </h3>
                                        </div>
                                    </div> 
                                @endif
                                
                                @if($action_slug == "industry-report")
                                @if($data->report_scope)
                                <h3 class="mt-4 frequently-asked"><strong>REPORT SCOPE</strong></h3>
                                  
                                    <div class="mt-3" id="report_scope">
                                        <?php echo $data->report_scope;?>
                                    </div>
                                @if(!$faq_data->isEmpty())  
                                <h3 class="mt-4 frequently-asked"><strong>FREQUENTLY ASKED QUESTIONS</strong></h3>
                                <div class="table">
                                	<div class="signle-services-item faq">
                                		<div id="accordion" class="accordion">
                                			<?php $i=1; ?>
                                		    @foreach($faq_data as $data1)
                                			<div class="card ">
                                				<div class="card-header" id="heading{{$data1->faq_id}}">
                                					<h5 class="mb-0">
                                						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data1->faq_id}}" aria-expanded="false" aria-controls="collapseOne">
                                							{{$data1->title}}
                                						</button>
                                					</h5>
                                				</div>
                                
                                				<div id="collapse{{$data1->faq_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$data1->faq_id}}" data-parent="#accordion">
                                					<div class="card-body">
                                						<?php echo $data1->description ?>
                                					</div>
                                				</div>
                                			</div>
                                			<?php $i++;?>
                                			@endforeach
                                		</div>
                                	</div>
                                </div>
                                
                                @endif

                                <!-- new content -->

                                    <div class="container my-3 text-center bg-image image-responsive" style="background-image: url('https://www.astuteanalytica.com/public/upload/report/MicrosoftTeams-image (50).webp');">
                                           <p class=" text-white pt-2 mb-1" style="font-family:Sans-Serif,poppins; font-size:16px;"><b>LOOKING FOR COMPREHENSIVE MARKET KNOWLEDGE? ENGAGE OUR EXPERT SPECIALISTS.</b></p>
                                           <a class="btn text-white mb-2" href="{{url('request-sample',$data->report_slug)}}?page=analyst" style="background:#182B8C;font-size:14px;">SPEAK TO AN ANALYST</a>
                                    </div>

                                    <style>
                                            .col-md-6 .btn 
                                            {
                                                position: absolute;
                                                top: 91%;
                                                left: 50%;
                                                 transform: translate(-50%, -50%);
                                                 -ms-transform: translate(-50%, -50%);                                                
                                                 border: none;
                                                 cursor: pointer;
                                            }
                                        </style>

                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                <img class="image-responsive ml-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/KEY QUESTION FINAL-01.svg" alt="Key Questions Answered" style="padding-right:15px; width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}">REQUEST SAMPLE</a>  
                                                </div>

                                                <div class="col-md-6">
                                                <img class="image-responsive mr-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/Why Choose Astute Analytica-01 (3).svg" alt="Why to Choose AstuteAnalytica" style="padding-left:15px;width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}?page=analyst">SPEAK TO ANALYST</a>
                                                </div>

                                            </div>
                                        </div>

                                @elseif($data->report_description_1)
                                @if(!$faq_data->isEmpty())  
                                <h3 class="mt-4 frequently-asked"><strong>FREQUENTLY ASKED QUESTIONS</strong></h3>
                                <div class="table">
                                	<div class="signle-services-item faq">
                                		<div id="accordion" class="accordion">
                                			<?php $i=1; ?>
                                		    @foreach($faq_data as $data1)
                                			<div class="card ">
                                				<div class="card-header" id="heading{{$data1->faq_id}}">
                                					<h5 class="mb-0">
                                						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data1->faq_id}}" aria-expanded="false" aria-controls="collapseOne">
                                							{{$data1->title}}
                                						</button>
                                					</h5>
                                				</div>
                                
                                				<div id="collapse{{$data1->faq_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$data1->faq_id}}" data-parent="#accordion">
                                					<div class="card-body">
                                						<?php echo $data1->description ?>
                                					</div>
                                				</div>
                                			</div>
                                			<?php $i++;?>
                                			@endforeach
                                		</div>
                                	</div>
                                </div>
                                
                                @endif

                                <!-- new content -->
                                <div class="container my-3 text-center bg-image image-responsive" style="background-image: url('https://www.astuteanalytica.com/public/upload/report/MicrosoftTeams-image (50).webp');">
                                           <p class=" text-white pt-2 mb-1" style="font-family:Sans-Serif,poppins; font-size:16px;"><b>LOOKING FOR COMPREHENSIVE MARKET KNOWLEDGE? ENGAGE OUR EXPERT SPECIALISTS.</b></p>
                                           <a class="btn text-white mb-2" href="{{url('request-sample',$data->report_slug)}}?page=analyst" style="background:#182B8C;font-size:14px;">SPEAK TO AN ANALYST</a>
                                    </div>

                                    <style>
                                            .col-md-6 .btn 
                                            {
                                                position: absolute;
                                                top: 91%;
                                                left: 50%;
                                                 transform: translate(-50%, -50%);
                                                 -ms-transform: translate(-50%, -50%);                                                
                                                 border: none;
                                                 cursor: pointer;
                                            }
                                        </style>

                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                <img class="image-responsive ml-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/KEY QUESTION FINAL-01.svg" alt="Key Questions Answered" style="padding-right:15px; width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}">REQUEST SAMPLE</a>  
                                                </div>

                                                <div class="col-md-6">
                                                <img class="image-responsive mr-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/Why Choose Astute Analytica-01 (3).svg" alt="Why to Choose AstuteAnalytica" style="padding-left:15px;width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}?page=analyst">SPEAK TO ANALYST</a>
                                                </div>

                                            </div>
                                        </div>
                                @elseif($data->report_description_2)
                                @if(!$faq_data->isEmpty())  
                                <h3 class="mt-4 frequently-asked"><strong>FREQUENTLY ASKED QUESTIONS</strong></h3>
                                <div class="table">
                                	<div class="signle-services-item faq">
                                		<div id="accordion" class="accordion">
                                			<?php $i=1; ?>
                                		    @foreach($faq_data as $data1)
                                			<div class="card ">
                                				<div class="card-header" id="heading{{$data1->faq_id}}">
                                					<h5 class="mb-0">
                                						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data1->faq_id}}" aria-expanded="false" aria-controls="collapseOne">
                                							{{$data1->title}}
                                						</button>
                                					</h5>
                                				</div>
                                
                                				<div id="collapse{{$data1->faq_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$data1->faq_id}}" data-parent="#accordion">
                                					<div class="card-body">
                                						<?php echo $data1->description ?>
                                					</div>
                                				</div>
                                			</div>
                                			<?php $i++;?>
                                			@endforeach
                                		</div>
                                	</div>
                                </div>
                                
                                @endif

                                <!-- new content -->
                                <div class="container my-3 text-center bg-image image-responsive" style="background-image: url('https://www.astuteanalytica.com/public/upload/report/MicrosoftTeams-image (50).webp');">
                                           <p class=" text-white pt-2 mb-1" style="font-family:Sans-Serif,poppins; font-size:16px;"><b>LOOKING FOR COMPREHENSIVE MARKET KNOWLEDGE? ENGAGE OUR EXPERT SPECIALISTS.</b></p>
                                           <a class="btn text-white mb-2" href="{{url('request-sample',$data->report_slug)}}?page=analyst" style="background:#182B8C;font-size:14px;">SPEAK TO AN ANALYST</a>
                                    </div>

                                    <style>
                                            .col-md-6 .btn 
                                            {
                                                position: absolute;
                                                top: 91%;
                                                left: 50%;
                                                 transform: translate(-50%, -50%);
                                                 -ms-transform: translate(-50%, -50%);                                                
                                                 border: none;
                                                 cursor: pointer;
                                            }
                                        </style>

                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                <img class="image-responsive ml-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/KEY QUESTION FINAL-01.svg" alt="Key Questions Answered" style="padding-right:15px; width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}">REQUEST SAMPLE</a>  
                                                </div>

                                                <div class="col-md-6">
                                                <img class="image-responsive mr-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/Why Choose Astute Analytica-01 (3).svg" alt="Why to Choose AstuteAnalytica" style="padding-left:15px;width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}?page=analyst">SPEAK TO ANALYST</a>
                                                </div>

                                            </div>
                                        </div>
                                @else($data->report_description_3)
                                @if(!$faq_data->isEmpty())  
                                <h3 class="mt-4 frequently-asked"><strong>FREQUENTLY ASKED QUESTIONS</strong></h3>
                                <div class="table">
                                	<div class="signle-services-item faq">
                                		<div id="accordion" class="accordion">
                                			<?php $i=1; ?>
                                		    @foreach($faq_data as $data1)
                                			<div class="card ">
                                				<div class="card-header" id="heading{{$data1->faq_id}}">
                                					<h5 class="mb-0">
                                						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data1->faq_id}}" aria-expanded="false" aria-controls="collapseOne">
                                							{{$data1->title}}
                                						</button>
                                					</h5>
                                				</div>
                                
                                				<div id="collapse{{$data1->faq_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$data1->faq_id}}" data-parent="#accordion">
                                					<div class="card-body">
                                						<?php echo $data1->description ?>
                                					</div>
                                				</div>
                                			</div>
                                			<?php $i++;?>
                                			@endforeach
                                		</div>
                                	</div>
                                </div>
                                
                                @endif

                                <!-- new content -->
                                <div class="container my-3 text-center bg-image image-responsive" style="background-image: url('https://www.astuteanalytica.com/public/upload/report/MicrosoftTeams-image (50).webp');">
                                           <p class=" text-white pt-2 mb-1" style="font-family:Sans-Serif,poppins; font-size:16px;"><b>LOOKING FOR COMPREHENSIVE MARKET KNOWLEDGE? ENGAGE OUR EXPERT SPECIALISTS.</b></p>
                                           <a class="btn text-white mb-2" href="{{url('request-sample',$data->report_slug)}}?page=analyst" style="background:#182B8C;font-size:14px;">SPEAK TO AN ANALYST</a>
                                    </div>

                                    <style>
                                            .col-md-6 .btn 
                                            {
                                                position: absolute;
                                                top: 91%;
                                                left: 50%;
                                                 transform: translate(-50%, -50%);
                                                 -ms-transform: translate(-50%, -50%);                                                
                                                 border: none;
                                                 cursor: pointer;
                                            }
                                        </style>

                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                <img class="image-responsive ml-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/KEY QUESTION FINAL-01.svg" alt="Key Questions Answered" style="padding-right:15px; width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}">REQUEST SAMPLE</a>  
                                                </div>

                                                <div class="col-md-6">
                                                <img class="image-responsive mr-2" loading="lazy" src="https://www.astuteanalytica.com/public/upload/report/Why Choose Astute Analytica-01 (3).svg" alt="Why to Choose AstuteAnalytica" style="padding-left:15px;width:100% !important; height:auto !important;">
                                                <a class="btn text-white" style="background:#182B8C;" href="{{url('request-sample',$data->report_slug)}}?page=analyst">SPEAK TO ANALYST</a>
                                                </div>

                                            </div>
                                        </div>

                                @endif
                                <!-- @if(!$faq_data->isEmpty())  
                                <h3 class="mt-4 frequently-asked"><strong>FREQUENTLY ASKED QUESTIONS</strong></h3>
                                <div class="table">
                                	<div class="signle-services-item faq">
                                		<div id="accordion" class="accordion">
                                			<?php $i=1; ?>
                                		    @foreach($faq_data as $data1)
                                			<div class="card ">
                                				<div class="card-header" id="heading{{$data1->faq_id}}">
                                					<h5 class="mb-0">
                                						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data1->faq_id}}" aria-expanded="false" aria-controls="collapseOne">
                                							{{$data1->title}}
                                						</button>
                                					</h5>
                                				</div>
                                
                                				<div id="collapse{{$data1->faq_id}}" class="collapse @if($i==1)  @endif" aria-labelledby="heading{{$data1->faq_id}}" data-parent="#accordion">
                                					<div class="card-body">
                                						<?php echo $data1->description ?>
                                					</div>
                                				</div>
                                			</div>
                                			<?php $i++;?>
                                			@endforeach
                                		</div>
                                	</div>
                                </div>
                                
                                @endif -->
                                @endif
                               
                                       
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
            @include('front.report.price_panel')


        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalInfographic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal_dial modal-lg" role="document">
    <div class="modal-content bg_transparent">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Infographic</h5>
        
      </div> -->
      <div class="modal-body ">
         <div class="row">
            <div class="col-8 p-1">
                <div class="bg-white ">
                    <img class="lazyload" data-src="{{ 'https://d1ldvpqox0v0p3.cloudfront.net/upload/report/' .$data->infographics }}" width="100%" alt="{{$data->alt_tag}}" width="100%" alt="{{$data->alt_tag}}" >
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="bg-white p-2">
                    <div class="justify-content-between d-flex ">
                        <h6 class="mb-0 mt-1"><strong>Share</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center shareBtna my-4">
<!--                         <a href=""><i class="fas fa-code"></i></a>
                        <a href=""><i class="fas fa-envelope"></i></a> -->
                        <a href="https://www.facebook.com/sharer.php?u={{ url('/industry-report/' .$data->report_slug) }}?count=no" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/share?mini=true&url={{ url('/industry-report/' .$data->report_slug) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url('/industry-report/' .$data->report_slug)}}"><i class="fab fa-linkedin-in" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;"></i></a>

                    </div>
                </div>
            </div>
         </div>
      </div>
      
    </div>
  </div>
</div>
<div class="requestmobile">
	<div class="container">
		<ul>
			<li><a href="tel:+18884296757">Call</a></li>
			<li><a href="mailto:sales@astuteanalytica.com">Email</a></li>
			<li><a href="{{url('request-sample',$slu_report)}}">Request Sample</a></li>
		</ul>
	</div>
</div>
<!-- Modal -->

<script>

      $(document).ready(function() {
         var naj=  '<?=$url_segment?>';  
                    
         $('.bordRed12 option[value="'+naj+'"]').prop('selected', true);
    });

</script>
<script>
    var bargraph_x=$('#bargraph_x').val();
    var bargraph_x = bargraph_x.split(',');

    var bargraph_y=$('#bargraph_y').val();
    var bargraph_y = bargraph_y.split(',');

    var bargraph_fake=$('#bargraph_fake').val();
var bargraph_fake = bargraph_fake.split(',');
  
var xValues = bargraph_x;
var yValues = bargraph_y;
var bargraph_text=$('#bargraph_text').val();
new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    fake:bargraph_fake,
    datasets: [{
      backgroundColor: "#046489",
      data: yValues
    }]
  },
  options: {
      title: {
        display: !0,
        position: "top",
        text: bargraph_text,
        fontSize: "16",
        fontColor: "#333333",
        fontFamily: "Times New Roman, Times, serif"
      },
      tooltips: {
        enabled: !1
      },
      animation: {
        duration: 2e3
      },
      plugins: {
        labels: {
          render: "label"
        },
        deferred: {
          xOffset: 150,
          yOffset: "50%",
          delay: 1e3
        }
      },
      scales: {
        xAxes: [{
          barPercentage: .5,
          gridLines: {
            display: !1
          },
          ticks: {
            beginAtZero: !0
          },
          scaleLabel: {
            display: true,
            labelString: "www.astuteanalytica.com",
            fontStyle: 'italic',
            fontSize: "11",
          }
        }],
        yAxes: [{
          gridLines: {
            display: !1,
            drawBorder: !1
          },
          ticks: {
            display: !1,
            beginAtZero: !0
          }
        }]
      },
      legend: {
        display: !1,
        position: "top"
      }
    }
});



</script>
<script>
var piechart_x=$('#piechart_x').val();
var piechart_x = piechart_x.split(',');

var piechart_y=$('#piechart_y').val();
var piechart_y = piechart_y.split(',');

var piechart_color=$('#piechart_color').val();
var piechart_color = piechart_color.split(',');

var piechart_fake=$('#piechart_fake').val();
var piechart_fake = piechart_fake.split(',');

var piechart_text=$('#piechart_text').val();
var xValues = piechart_x;
var yValues = piechart_y;
var barColors = piechart_color;

new Chart("myChart1", {
    type: "doughnut",
    data: {
      datasets: [{
        data: yValues,
        backgroundColor: barColors
      }],
      labels: xValues,
      fake: piechart_fake
    },
    options: {
      tooltips: {
        enabled: !1
      },
      title: {
        display: !0,
        position: "top",
        text: piechart_text,
        fontSize: "16",
        fontColor: "#333333",
        fontFamily: "Times New Roman, Times, serif",
        lineHeight: "2"
      },
      animation: {
        duration: 2e3
      },
      plugins: {
        labels: {
          render: "label",
          fontColor: "#333333",
          fontFamily: "Times New Roman, Times, serif",
          lineHeight: "5",
          padding: "20"
        },
        outlabels: !1
      },
      scales: {
        xAxes: [{
          categoryPercentage: .2,
          barPercentage: .5,
          gridLines: {
            display: !1,
            drawBorder: !1
          },
          scaleLabel: {
            display: true,
            labelString: "www.astuteanalytica.com",
            fontStyle: 'italic',
            fontSize: "11",
            position: "right"
          },
          ticks: {
            display: !1,
            beginAtZero: !0,
          }
        }]
      },
      legend: {
        display: !0,
        position: "right",
        labels: {
          fontColor: "#333333",
          fontFamily: "Times New Roman, Times, serif"
        }
      }
    }
});
</script>
@endforeach
@stop
