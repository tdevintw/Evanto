<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Ticket</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        width: 210mm;
        height: 297mm;
      }
      .ticket {
        border: 1px solid black;
        border-radius: 10px;
        box-sizing: border-box;
        width: 160mm;
        margin-top: 10mm;
        height: 60mm;
        background-color: red;
      }
      .imagee {
        float: left;
        width: 80mm;
        height: 60mm;
        background-color: black;
        text-align: center;
        border-radius: 10px 0 0 10px;
        border-right: solid 1px black;

      }
      .content {
        float: left;
        width: 80mm;
        height: 60mm;
        background-color: black;
        text-align: center;
        border-radius: 0 10px 10px 0;

      }
      .infos {
        color: white;
        margin-top: 0.5mm;
        margin-bottom: 1mm;
        font-size: 2.5mm;
        font-family: 'Courier New', Courier, monospace;
      }
      .title{
        font-family: 'Courier New', Courier, monospace;
        color: white;
        font-size: 7mm;
      }
      .event_image
      {
        width: 80mm;
        height:60mm;
        border-radius: 10px 0 0 10px;
      }

    </style>
  </head>
  <body>
    <div>
      <div class='ticket'>
        <div class="imagee">
           <img class="event_image" src="https://wallpapercave.com/wp/wp2349395.jpg" alt=""> 
        </div>
        <div class="content">
          <div style='margin-top: 6mm;'>
            <div class="event-details">
              <div class="event-title">
                <div style="width: 80mm;align-text:center">
                   <img style="width:40mm;" src="https://i.ibb.co/Npc7dgx/Evanto.png" alt=""> 
                </div>

                <span class="title">{{ $ticket->request->event->title }}</span>
              </div>
            </div>
          </div>
          <div>
            <h5 style="margin-top: 3mm;" class="infos">Name: {{$ticket->user->name}}</h5>
            <h5 class="infos">UID: {{$ticket->id}}</h5>
            <h5 class="infos">Location: {{$ticket->request->event->location}}</h5>
            <h5 class="infos">Date: {{$date}}</h5>
            <h5 class="infos">Reserved In: {{$ticket->created_at}}</h5>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
