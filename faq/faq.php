<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
  ];
?>

<style>
  body
  {
    background-image: url( "welcome/banner.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
</style>

<div class="container">

  <div class="row">
    <div class="col-10 mx-auto">
      <div class="h5 py-1">
        Frequently Asked Questions
      </div>
      <div class="accordion" id="faq">

        <div class="card">
          <div class="card-header p-2" id="q1">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a1" aria-expanded="true" aria-controls="a1">
                Q: How does this work?
              </button>
            </h5>
          </div>
          <div id="a1" class="collapse" aria-labelledby="q1" data-parent="#faq">
            <div class="card-body">
              <b>Answer:</b> It works using the Bootstrap 4 collapse component with cards to make a vertical accordion that expands and collapses as questions are toggled.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-2" id="q2">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a2" aria-expanded="false" aria-controls="a2">
              Q: What is Bootstrap 4?
            </button>
            </h5>
          </div>
          <div id="a2" class="collapse" aria-labelledby="q2" data-parent="#faq">
            <div class="card-body">
                Bootstrap is the most popular CSS framework in the world. The latest version released in 2018 is Bootstrap 4. Bootstrap can be used to quickly build responsive websites.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-2" id="q3">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a3" aria-expanded="false" aria-controls="a3">
                Q. What is another question?
              </button>
            </h5>
          </div>
          <div id="a3" class="collapse" aria-labelledby="q3" data-parent="#faq">
            <div class="card-body">
              The answer to the question can go here.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-2" id="q4">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a4" aria-expanded="false" aria-controls="a4">
                Q. What is the next question?
              </button>
            </h5>
          </div>
          <div id="a4" class="collapse" aria-labelledby="q4" data-parent="#faq">
            <div class="card-body">
              The answer to this question can go here. This FAQ example can contain all the Q/A that is needed.
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
