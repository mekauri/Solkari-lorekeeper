@extends('layouts.app')


@section('title') Welcome @endsection


@section('content')
{!! breadcrumbs(['Welcome' => 'linkthatgoesthere']) !!}

<!-----------------------------------------------------------------------------------------------------------
    CONTENT STARTS HERE
--------------------------------------------------------------------------------------------------------->

<!-- HEADER START -->
<div class="container my-4" style="background-image: url('https://static.wixstatic.com/media/95622c_04ea6a5088b64235b077a7e1f8dba462~mv2.png/v1/fill/w_2562,h_1440,al_c,q_95,usm_0.66_1.00_0.01,enc_auto/Solkari%20site.png'); background-size: cover; background-position: center; color: #0e3b73; padding: 20px;">

  <div class="row align-items-center">
  <div class="col-md-6">
      <!-- SOLKARI LOGO IMAGE-->
  <div class="text-center"><img class="img-fluid" style="width: 254px; height: 254px;" src="https://static.wixstatic.com/media/95622c_5c3d703964074611a4c41e5926dc65a0~mv2.png/v1/fill/w_706,h_706,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/95622c_5c3d703964074611a4c41e5926dc65a0~mv2.png" alt="Sample Image" /></div>
  </div>

  <!-- Solure City Welcome text-->
  <div class="col-md-6" style="text-align: center;
    vertical-align: middle;">
  <div class="d-flex justify-content-center align-items-center" style="background-color: rgba(255, 255, 255, 0.85); padding: 20px; border-radius: 20px; height: 100%;">
  <h1 style="  color: #0e3b73;font-size:calc(1.5rem + 2.5vw);">Welcome to Solure City</h1>
  </div>
  </div>
  </div>
  </div>
  <!-- HEADER END-->

   <!--MONA HELLO row tag start-->
  <div class="row text-center">

   <!--Col 1 start-->
<div class="col-12">
    <img src="https://static.wixstatic.com/media/95622c_97eea3658c724549ae394acd366fc3a7~mv2.gif"
         alt="Mona GIF"
         class="responsive-image">
  </div>
  <!--Col 1 end tag-->

  <style>
.responsive-image {
  width: 50%; /* Default width for larger screens */
  max-width: 500px; /* Maximum width to prevent the image from getting too large */
  height: auto; /* Maintain aspect ratio */
}

@media (max-width: 768px) { /* Adjust for mobile devices */
  .responsive-image {
    width: calc(100% - 2rem); /* Make it nearly full width on smaller screens with a little padding */
    max-width: none; /* Remove the max-width on mobile */
  }
}


</style>

 <!-- Col 2 Start-->
<div class="row justify-content-center align-items-center">
    <!--MONA SPEECH BUBBLE START-->
    <div class="card border-0 rounded-circle p-2 m-2"
         style="box-shadow: 2px 3px 0 rgba(0,0,0,0.25); background-color:#f1a5bb;">
      <div class="text-center"
           style="border-radius: 50%; padding: 5%; overflow: visible; position: relative; z-index:2; background-color:#f1a5bb; color:#fffafe;">
        <h1 style="color:#002a40; font-size: calc(1.5rem + 1vw);">Hello there!</h1>
        <p style="color:#002a40; font-size: calc(1rem + 1vw);">
          You’ve entered into the world of Allura where we Solkari live! What’s a Solkari? Well, you are in the right place to find out!
        </p>
      </div>
      <!--Text end div-->
    </div>
    <!-- SPEECH BUBBBLE END TAG-->
  </div>
  <!-- Col 2 end tag-->

  <!-- Add this CSS -->
  <style>
    .card {
      max-width: 80% !important; /* Makes the card width responsive */
      margin: auto !important; /* Centers the card */
      padding: 5% !important; /* Adds padding for text comfort */
      overflow: visible !important; /* Allows content to expand beyond if necessary */
    }

    .text-center {
      padding: 5% !important; /* Ensures text inside has breathing room */
      overflow: visible !important; /* Prevents text from being cut off */
    }

    h1, p {
      word-wrap: break-word !important; /* Ensures long words break to fit inside */
    }
  </style>

  </div>
  <!-- Row end tag-->

  <!-- Tabbed content with background image -->
  <div class="container my-4" style="background-image: url('https://static.wixstatic.com/media/95622c_04ea6a5088b64235b077a7e1f8dba462~mv2.png/v1/fill/w_2562,h_1440,al_c,q_95,usm_0.66_1.00_0.01,enc_auto/Solkari%20site.png'); background-size: cover; background-position: center; color: #0e3b73; padding: 20px;">

  <ul id="myTab" class="nav nav-tabs justify-content-between" style="border-bottom: 2px solid #0f53a6;  " role="tablist">

  <li class="nav-item flex-fill"><a id="about-tab" class="nav-link active" style="background-color: #0f53a6; color: white; text-align: center;" role="tab" href="#about" data-toggle="tab" aria-controls="about" aria-selected="true">About</a></li>

  <li class="nav-item flex-fill"><a id="joinus-tab" class="nav-link" style="background-color: #0f53a6; color: white; text-align: center;" role="tab" href="#joinus" data-toggle="tab" aria-controls="joinus" aria-selected="false">Join Us</a></li>

  </ul>

  <!-- ABOUT SECTION-->
  <div class="tab-content mt-4"><!-- About Section Tab -->

  <div id="about" class="tab-pane fade show active" role="tabpanel" aria-labelledby="about-tab">
  <div class="p-4" style="background-color: rgba(255, 255, 255, 0.80); color: #0e3b73; border-radius: 8px;  ">
  <h1 class="text-center" style=" ">About Solkaries</h1>
  <div ><img class="img-fluid" style="width: 100%; height: auto;" src="https://static.wixstatic.com/media/95622c_90c529cb45f943eca64afd84f03c3620~mv2.gif" alt="Solkaries" /></div>
  <div class="row">
  <div class="container">

  <hr style="height:2px;border-width:3;color:gray;background-color:#281bd6">

  <h1 class="justify-content-center">Quick Look Navagation</h1>
  <hr>

  <div style="display: flex; flex-direction: column; align-items: center;">
    <a class="btn" href="{{ url('myo') }}" style="
      text-decoration: none;
      padding: 0.5rem;
      border: 1px solid #333333;
      background-color: #0f53a6;
      color: #ffffff;
      display: block;
      text-align: center;
      width: 100%;
      margin-bottom: 10px;">
        MYO Guide
    </a>

    <a class="btn" href="{{ url('lore') }}" style="
      text-decoration: none;
      padding: 0.5rem;
      border: 1px solid #333333;
      background-color: #0f53a6;
      color: #ffffff;
      display: block;
      text-align: center;
      width: 100%;
      margin-bottom: 10px;">
        Solkari History || Lore
    </a>

    <a class="btn" href="{{ url('prompts') }}" style="
      text-decoration: none;
      padding: 0.5rem;
      border: 1px solid #333333;
      background-color: #0f53a6;
      color: #ffffff;
      display: block;
      text-align: center;
      width: 100%;
      margin-bottom: 10px;">
        Events
    </a>

    <a class="btn" href="{{ url('sales') }}" style="
    text-decoration: none;
    padding: 0.5rem;
    border: 1px solid #333333;
    background-color: #0f53a6;
    color: #ffffff;
    display: block;
    text-align: center;
    width: 100%;
    margin-bottom: 10px;">
      Adopts
  </a>

    <a class="btn" href="{{ url('faq') }}" style="
      text-decoration: none;
      padding: 0.5rem;
      border: 1px solid #333333;
      background-color: #0f53a6;
      color: #ffffff;
      display: block;
      text-align: center;
      width: 100%;">
        FAQ
    </a>


</div>
  <!-- ^ Div display end tag-->

</div>
    <!-- ^ Div contianer About end-->

</div>
  <!-- ^ Div row about end-->

</div>
  <!-- ^ Div p-4 about end-->

</div>
  <!-- ^ Div id about tag end-->




  <!-- Join Us Tab -->
  <div id="joinus" class="tab-pane fade" role="tabpanel" aria-labelledby="joinus-tab">
  <div class="p-4" style="background-color: rgba(255, 255, 255, 0.80); color: #0e3b73; border-radius: 8px;  ">
  <h2 class="text-center" style=" ">Join Us</h2>
  <!-- Centered Image -->
  <div class="text-center"><img class="img-fluid" src="https://static.wixstatic.com/media/95622c_be1d1e0d27fb4c90bd5fa7d31046ce89~mv2.png/v1/fill/w_996,h_380,al_c,q_90,enc_auto/solkarigroupphoto.png" alt="Solkari Group Photo" /></div>

  <hr style="height:2px;border-width:3;color:gray;background-color:#281bd6">

  <p style=" ">Ready to dive into the world of Solkaries? Here's how you can get involved:</p>
  <ul style="list-style-type: none;">
  <li><strong>Join the Discord:</strong> Connect with our community and stay updated on the latest news and events.</li>
  <li><strong>Join the Website:</strong> Join this website to interact and keep track with your Solkairies!</li>
  </ul>
  <br />
  <h3 style=" ">Guide to Getting Started:</h3><hr>
  <p style=" "><b>What is a Closed Species?</b> <hr> A Closed Species is a humanoid or creature race that can only be created with permission from the Creator and monitored closely. They have specific traits and typically fit into a created world with its own lore. This is what distinguishes them from regular OCs (Original Characters). A Closed Species character will canonically exist in the world created and typically only exist for that purpose. MYOs and Adoptables must be gained in order to participate within a Closed Species. Closed Species are a medium in which Artists and creators can make, create, and interact while making income from selling approved Adopts. This is a way to not only enjoy a community but to also support artists and their work.</p>
  <hr>
  <h3 style=" ">Terms To Know:</h3>

  <!------------------------------------------------------------------------
    ACCORDION TERMS START
    ----------------------------------------------------------------------->

<!-- Accordion for Terms -->
<div class="container my-4">
    <div id="termsAccordion" class="accordion">
      <div class="card border-0">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#termsAccordion">
          <div class="card-body p-3">

            <!-- Accordion Item Start -->
            <div id="termsList" class="list-group">

              <!-- Item 1: CS - Closed Species -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termCS" aria-expanded="false" aria-controls="termCS">
                CS - Closed Species
              </button>
              <div id="termCS" class="collapse">
                <p class="ml-3 mt-2">A Closed Species is a humanoid or creature race that can only be created with permission from the Creator and monitored closely.</p>
              </div>

              <!-- Item 2: OS - Open Species -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termOS" aria-expanded="false" aria-controls="termOS">
                OS - Open Species
              </button>
              <div id="termOS" class="collapse">
                <p class="ml-3 mt-2">Anyone can create a species in the world without an MYO or Adopt. Typically meant for the fun of making a group and not involving monetary value.</p>
              </div>

              <!-- Item 3: MYO - Make Your Own -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termMYO" aria-expanded="false" aria-controls="termMYO">
                MYO - Make Your Own
              </button>
              <div id="termMYO" class="collapse">
                <p class="ml-3 mt-2">A MYO Slot allows you to design your own character in the species. In CS these must be approved and will be added to a Masterlist to prove authenticity.</p>
              </div>

              <!-- Item 4: DTA - Draw to Adopt -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termDTA" aria-expanded="false" aria-controls="termDTA">
                DTA - Draw to Adopt
              </button>
              <div id="termDTA" class="collapse">
                <p class="ml-3 mt-2">Some Artists may draw a design and offer it through a DTA where you can draw the design and the designer will pick a winner to officially own the design.</p>
              </div>

              <!-- Item 5: OTA - Offer to Adopt -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termOTA" aria-expanded="false" aria-controls="termOTA">
                OTA - Offer to Adopt
              </button>
              <div id="termOTA" class="collapse">
                <p class="ml-3 mt-2">Offers can vary from art, money, trades, and other options which are specified by the artists offering the design.</p>
              </div>

              <!-- Item 6: F2U - Free to Use -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termF2U" aria-expanded="false" aria-controls="termF2U">
                F2U - Free to Use
              </button>
              <div id="termF2U" class="collapse">
                <p class="ml-3 mt-2">This typically applies to character bases, codes, etc.</p>
              </div>

              <!-- Item 7: P2U - Pay to Use -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termP2U" aria-expanded="false" aria-controls="termP2U">
                P2U - Pay to Use
              </button>
              <div id="termP2U" class="collapse">
                <p class="ml-3 mt-2">This typically applies to character bases, codes, etc.</p>
              </div>

              <!-- Item 8: YCH - Your Character Here -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termYCH" aria-expanded="false" aria-controls="termYCH">
                YCH - Your Character Here
              </button>
              <div id="termYCH" class="collapse">
                <p class="ml-3 mt-2">You can pay to have an artist draw your character into a base premade by said artist.</p>
              </div>

              <!-- Item 9: SB - Starting Bid -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termSB" aria-expanded="false" aria-controls="termSB">
                SB - Starting Bid
              </button>
              <div id="termSB" class="collapse">
                <p class="ml-3 mt-2">The Bid amount at which an auction for an adopt will begin with.</p>
              </div>

              <!-- Item 10: MI - Minimum Increase -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termMI" aria-expanded="false" aria-controls="termMI">
                MI - Minimum Increase
              </button>
              <div id="termMI" class="collapse">
                <p class="ml-3 mt-2">The minimum amount you must increase your Bid by. Ex: SB is $15, MI is $5; if someone claims the SB then the next person would bid $20, increasing by at least the 5 minimum.</p>
              </div>

              <!-- Item 11: AB - Auto-buy -->
              <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#termAB" aria-expanded="false" aria-controls="termAB">
                AB - Auto-buy
              </button>
              <div id="termAB" class="collapse">
                <p class="ml-3 mt-2">An option to purchase the adopt immediately and bypass the auction.</p>
              </div>

            </div>
            <!-- Accordion Item End -->

          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Additional Styles for Better Mobile View -->
  <style>
    /* General styles for the accordion */
    .card-body {
      padding: 1rem; /* Increased padding for readability */
    }

    .list-group-item {
      font-size: calc(0.875rem + 0.5vw); /* Responsive font size for better readability */
      padding: 1rem; /* Add padding for a cleaner look */
      border: none; /* Remove border for a cleaner appearance */
      background-color: #f8f9fa; /* Light background for better contrast */
      margin-bottom: 0.5rem; /* Add spacing between items */
    }

    .collapse p {
      font-size: calc(0.875rem + 0.5vw); /* Responsive font size for text inside collapses */
      margin: 0.5rem 0; /* Add margin for text inside collapses */
    }

    /* Media query for smaller screens */
    @media (max-width: 576px) {
      .list-group-item {
        font-size: 1rem; /* Adjust font size for smaller screens */
        padding: 1rem; /* Adjust padding for smaller screens */
        text-align: center; /* Center align text on smaller screens */
      }

      .collapse p {
        font-size: 0.9rem; /* Smaller font size for paragraph on mobile */
        text-align: left; /* Align text to the left */
      }
    }
  </style>


  <!------------------------------------------------------------------------
    ACCORDION TERMS END
    ----------------------------------------------------------------------->

  <h3 style=" ">What Can You Do in Solkaries?</h3> <hr>
  <p style=" ">You'll be able to own a Solkari of your very own through a MYO slot or Adopt; from there you'll be able to interact with this fictional world, explore it, and participate in the ever-evolving storyline.</p>
  <br>
  <h4 style=" ">Activities:</h4>
  <ul style="list-style-type: none;">
  <li><strong>Events:</strong> These will be typical fun events involving holidays, festivals, and other celebrations. Will be prompts for art and writing.</li>
  <li><strong>Quest Board:</strong> The quest board will be similar to Events in having prompts for art and writing but will have stories of their own and if completed can earn rewards.</li>
  <li><strong>Adventures:</strong> This is where the main storyline will progress. Through art and writing prompts and other various interactions you'll be able to help shape the outcome of the Solkari world.</li>
  <li><strong>Challenges:</strong> Similar to Events but focused more on themes or goals.</li>
  <li><strong>Contests:</strong> Will be held occasionally and will often come with rewards.</li>
  </ul>
  <h4 style=" ">How to Participate:</h4>
  <ul style="list-style-type: none;">
  <li><a href="link_to_discord">Join our Discord server</a></li>
  <li><a href="https://www.solkari.com/register">Register for an account</a></li>
  </ul>
  </div>
  </div>
  </div>
  </div>





<!-----------------------------------------------------------------------------------------------------------
    CONTENT ENDS HERE
--------------------------------------------------------------------------------------------------------->



@endsection
