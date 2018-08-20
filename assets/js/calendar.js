var today = moment().startOf('day');
var Items2 =[];
var Sections2 =[];

var fecha = document.getElementById('fecha').value;
        
    async function obtenerDatosDeApi() {
        const response = await fetch('http://localhost/koyer/api-reserva/'+fecha) 
        data = await response.json()
        await data.Items.map(function(data){
            var temp = {
                id : data.id,
                name : data.name,
                sectionID: data.sectionID,
                start: moment(data.start),
                end: moment(data.end),
                classes: data.classes,
                events: [
                    {
                        label: 'one',
                        at: moment(data.reserva.fecha_entrega),
                        classes: 'item-event-one'
                    }
                ]
            }
            Items2.push(temp)
        });

        await data.Sections.map(function(data){
            var temp = {
                id : parseInt(data.id),
                name : data.name
            }
            Sections2.push(temp)
        });
        
        $('body').tooltip({
            html: true
        });
        Calendar.Init()
      
      
    }
    

    


var Calendar = {
    Periods: [

        {
            Name: '1 month',
            Label: '1 Mes',
            TimeframePeriod: (60 * 24 * 1),
            TimeframeOverall: (60 * 24 * 28),
            TimeframeHeaders: [
                'MMM',
                'Do'
            ],
            Classes: 'period-1month'
        }
    ],


    Items: Items2,
  
  	Sections: Sections2,

    Init: function () {
        TimeScheduler.Options.GetSections = Calendar.GetSections;
        TimeScheduler.Options.GetSchedule = Calendar.GetSchedule;
        TimeScheduler.Options.Start = today;
        TimeScheduler.Options.Periods = Calendar.Periods;
        TimeScheduler.Options.SelectedPeriod = '1 month';
        TimeScheduler.Options.Element = $('.calendar');

        TimeScheduler.Options.AllowDragging = true;
        TimeScheduler.Options.AllowResizing = true;

        TimeScheduler.Options.Events.ItemClicked = Calendar.Item_Clicked;
        TimeScheduler.Options.Events.ItemDropped = Calendar.Item_Dragged;
        TimeScheduler.Options.Events.ItemResized = Calendar.Item_Resized;


        TimeScheduler.Options.Events.ItemMovement = Calendar.Item_Movement;
        TimeScheduler.Options.Events.ItemMovementStart = Calendar.Item_MovementStart;
        TimeScheduler.Options.Events.ItemMovementEnd = Calendar.Item_MovementEnd;

        TimeScheduler.Options.Text.NextButton = '&nbsp;';
        TimeScheduler.Options.Text.PrevButton = '&nbsp;';

        TimeScheduler.Options.MaxHeight = 100;
        
        /// esto es lo que agregue
      
      	TimeScheduler.Options.Events.ItemMouseEnter = Calendar.mouseOver; 
      	TimeScheduler.Options.Events.ItemMouseLeave = Calendar.mouseOut;
      
      	/// solo lo de arriba

        TimeScheduler.Init();
    },
  	
  	mouseOver: function(item) {
      
    },
  	
  	mouseOut: function() {
    },

    GetSections: function (callback) {
        callback(Calendar.Sections);
    },

    GetSchedule: function (callback, start, end) {
        callback(Calendar.Items);
    },

    Item_Clicked: function (item) {
        console.log('localhost/koyer/reserva/ver_reserva/'+data.Items.reserva);
    },

    Item_Dragged: function (item, sectionID, start, end) {
        var foundItem;

        console.log(item);
        console.log(sectionID);
        console.log(start);
        console.log(end);

        for (var i = 0; i < Calendar.Items.length; i++) {
            foundItem = Calendar.Items[i];

            if (foundItem.id === item.id) {
                foundItem.sectionID = sectionID;
                foundItem.start = start;
                foundItem.end = end;

                Calendar.Items[i] = foundItem;
            }
        }

        TimeScheduler.Init();
    },

    Item_Resized: function (item, start, end) {
        var foundItem;

        console.log(item);
        console.log(start);
        console.log(end);

        for (var i = 0; i < Calendar.Items.length; i++) {
            foundItem = Calendar.Items[i];

            if (foundItem.id === item.id) {
                foundItem.start = start;
                foundItem.end = end;

                Calendar.Items[i] = foundItem;
            }
        }

        TimeScheduler.Init();
    },

    Item_Movement: function (item, start, end) {
        var html;

        html =  '<div>';
        html += '   <div>';
        html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
        html += '   </div>';
        html += '   <div>';
        html += '       End: ' + end.format('Do MMM YYYY HH:mm');
        html += '   </div>';
        html += '</div>';

        $('.realtime-info').empty().append(html);
    },

    Item_MovementStart: function () {
        $('.realtime-info').show();
    },

    Item_MovementEnd: function () {
        $('.realtime-info').hide();
    }
};

$(document).ready(obtenerDatosDeApi());