@extends('layouts.app')


@section('title') FAQ @endsection


@section('content')
{!! breadcrumbs(['FAQ' => 'linkthatgoesthere']) !!}


<!------------------------------------------------------------------------
    CONTENT  STARTS HERE
    ----------------------------------------------------------------------->

    <h3 style=" ">FAQ</h3>

    <!------------------------------------------------------------------------
      ACCORDION FAQ START
      ----------------------------------------------------------------------->

  <!-- Accordion for Terms -->
  <div class="container my-4">
      <div id="termsAccordion" class="accordion">
        <div class="card border-0">
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#termsAccordion">
            <div class="card-body p-3">

              <!-- Accordion Item Start -->
              <div id="termsList" class="list-group">

                <!-- Question 1 -->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q1" aria-expanded="false" aria-controls="Q1">
                    How do I obtain a Solkari MYO and/or a Skyling slot?
                </button>
                <div id="Q1" class="collapse">
                  <p class="ml-3 mt-2">Slots can be obtained from Events, activities, or purchased from The Beyond. </p>
                </div>

                <!-- Question 2-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q2" aria-expanded="false" aria-controls="Q2">
                    How do I submit a Solkari and/or Skyling redesign?
                </button>
                <div id="Q2" class="collapse">
                    <p class="ml-3 mt-2">Please view the Design and Redesign sections of our TOS <a href="{{ url('info/terms') }}">here</a>. To submit a redesign use the ‘UPDATE DESIGN’ feature under settings on your Solkari’s character page.</p>
                </div>

                <!-- Question 3-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q3" aria-expanded="false" aria-controls="Q3">
                    How do I void a Solkari and/or Skyling?
                </button>
                <div id="Q3" class="collapse">
                    <p class="ml-3 mt-2">Please view the Voiding section in our TOS  <a href="{{ url('info/terms') }}">here</a>.</p>
                </div>

                <!-- Question 4-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q4" aria-expanded="false" aria-controls="Q4">
                    Am I a Solkari?
                </button>
                <div id="Q4" class="collapse">
                    <p class="ml-3 mt-2">
                        You aren’t a Solkari but you are a Skyling!</p>
                </div>

                    <!-- Question 4-->
                    <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q4" aria-expanded="false" aria-controls="Q4">
                        Are there fish in Allura?
                        </button>
                        <div id="Q4" class="collapse">
                            <p class="ml-3 mt-2">
                                Yes through sea portals. But not enough to cover the entire planet of Allura so these fish tend to stay within areas nearby civilization.
                            </p>
                        </div>

                    <!-- Question 5-->
                      <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q5" aria-expanded="false" aria-controls="Q5">
                        What happens to a Solkari’s wisp if the body is fully damaged? Ex: Stabbed through.

                    </button>
                    <div id="Q5" class="collapse">
                        <p class="ml-3 mt-2">
                            If the wisp is harmed, the energy starts to fade more rapidly in order to piece the body back together again</p>
                    </div>

                      <!-- Question 6-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q6" aria-expanded="false" aria-controls="Q6">
                    Can a damaged Wisp kill a solkari?

                    </button>
                    <div id="Q6" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes.</p>
                    </div>

                      <!-- Question 7-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q7" aria-expanded="false" aria-controls="Q7">
                    What happens when a Solkari dies?
                    </button>
                    <div id="Q7" class="collapse">
                        <p class="ml-3 mt-2">
                            If they reach a certain low point of energy they teleport back to their origin realm.</p>
                    </div>

                      <!-- Question 8-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q8" aria-expanded="false" aria-controls="Q8">
                    Can a Solkari heal themselves and other creatures?
                    </button>
                    <div id="Q8" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes, with enough energy and with specific spells. </p>
                    </div>

                      <!-- Question 9-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q9" aria-expanded="false" aria-controls="Q9">
                    Can Solkaries have pets?

                    </button>
                    <div id="Q9" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes. But usually not in their homes unless the creature is small enough.</p>
                    </div>

                      <!-- Question 10-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q10" aria-expanded="false" aria-controls="Q10">
                    Do plants grow and can energy come from plants?
                    </button>
                    <div id="Q10" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes. Allura can sustain all kinds of life. As for energy from plants, yes but very little as plants aren’t fully sentient.</p>
                    </div>

                      <!-- Question 11-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q11" aria-expanded="false" aria-controls="Q11">
                    Do Solkaries have farms?
                    </button>
                    <div id="Q11" class="collapse">
                        <p class="ml-3 mt-2">
                            Not really. But they do care for creatures who enter the realm, and aren’t hostile, and also grow flowers. </p>
                    </div>

                      <!-- Question 12-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q12" aria-expanded="false" aria-controls="Q12">
                    What are Solkari buildings made of?
                    </button>
                    <div id="Q12" class="collapse">
                        <p class="ml-3 mt-2">
                            On land- brick, stone
                            Underwater- rock and coral.
                            </p>
                    </div>

                      <!-- Question 13-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q13" aria-expanded="false" aria-controls="Q13">
                    Is there a concern about  overpopulation?
                    </button>
                    <div id="Q13" class="collapse">
                        <p class="ml-3 mt-2">
                            So far not an issue as the world can expand.</p>
                    </div>

                      <!-- Question 14-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q14" aria-expanded="false" aria-controls="Q14">
                    Are their hostile creatures?
                    </button>
                    <div id="Q14" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes, but that’s what the guards are for.</p>
                    </div>

                      <!-- Question 15-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q15" aria-expanded="false" aria-controls="Q15">
                    Do the Solkaries venture out super far?
                    </button>
                    <div id="Q15" class="collapse">
                        <p class="ml-3 mt-2">
                            They can but many do not due to dangers outside of Solure City.</p>
                    </div>

                      <!-- Question 16-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q16" aria-expanded="false" aria-controls="Q16">
                    What happens if a Skyling dies in Allura?
                    </button>
                    <div id="Q16" class="collapse">
                        <p class="ml-3 mt-2">
                            They have a chance to be saved but only for a short period of time. If unable, they die in whatever way their species dies. </p>
                    </div>
                      <!-- Question 17-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q17" aria-expanded="false" aria-controls="Q17">
                    Does magic take energy?/How do the Solkaries gain more energy?

                    </button>
                    <div id="Q17" class="collapse">
                        <p class="ml-3 mt-2">
                            No, magic and energy are  separate. They can take it through touch and store it within their torso. They can then return it to the garden of beginnings which can then be used to help those who are hurt and heal them.
                        </p>
                    </div>

                      <!-- Question 18-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q18" aria-expanded="false" aria-controls="Q18">
                    How long does energy last for a Solkari and can a Solkari have too much energy?
                    </button>
                    <div id="Q18" class="collapse">
                        <p class="ml-3 mt-2">
                            2 weeks. It is counted in amount by spheres. If a solkari has too much energy it burns off in a glow around them. And is very wasteful. </p>
                    </div>

                        <!-- Question 19-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q19" aria-expanded="false" aria-controls="Q19">
                    Can Solkaries be evil?
                    </button>
                    <div id="Q19" class="collapse">
                        <p class="ml-3 mt-2">
                            In short, yes. However, Solkaries are highly unlikely to kill creatures because that would also stop a potential source of energy. But can they lie, cheat, steal, etc.? Yes. But Solure City does have laws enforced which tend to dissuade any harmful behaviors.
                        </p>
                    </div>

                        <!-- Question 20-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q20" aria-expanded="false" aria-controls="Q20">
                    Can a Solkari steal another Solkari’s energy and/or Kill them?

                    </button>
                    <div id="Q20" class="collapse">
                        <p class="ml-3 mt-2">
                            They can cause damage but they are unable to take energy from a Solkari as it requires willingness to give away energy. Thus a Solkari must be willing to sacrifice themself to “die” enough to try and save another.
                        </p>
                    </div>

                        <!-- Question 21-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q21" aria-expanded="false" aria-controls="Q21">
                    Can there be more than one monarch alive? What do the other monarchs and legendary Solkari do if not in power?

                    </button>
                    <div id="Q21" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes. They create the order.
                        </p>
                    </div>

                        <!-- Question 22-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q22" aria-expanded="false" aria-controls="Q22">
                    How is it decided who is the next monarch? Why are only Legendary Solkari monarchs?
                    </button>
                    <div id="Q22" class="collapse">
                        <p class="ml-3 mt-2">
                            Typically by how long they have been there. However, under circumstances it tends to fall upon the legendary Solkari who can handle the job. Due to their special abilities.</p>
                    </div>

                        <!-- Question 23-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q23" aria-expanded="false" aria-controls="Q23">
                    Can a Land Solkari go underwater if the magic of Allura lets them breathe and vice versa for sea Solkari?
                    </button>
                    <div id="Q23" class="collapse">
                        <p class="ml-3 mt-2">
                            Yes. However, movement is limited. And certain traits may be affected by the presence or lack of presence of water. </p>
                    </div>

                        <!-- Question 24-->
                <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#Q24" aria-expanded="false" aria-controls="Q24">
                    What does a Solkari know when they first arrive?
                    </button>
                    <div id="Q24" class="collapse">
                        <p class="ml-3 mt-2">
                            They know their language, how to speak, write, and read it. They are capable of problem-solving and caring for themselves. They are capable of locating energy. What they learn from being in Solure City is how the world of Allura functions, history, and the rules and regulations of the city and its functions.</p>
                    </div>



<!--- ADD MORE QUESTIONS BELOW HERE-->







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







  <!-----------------------------------------------------------------------------------------------------------
      CONTENT ENDS HERE
  --------------------------------------------------------------------------------------------------------->



@endsection


