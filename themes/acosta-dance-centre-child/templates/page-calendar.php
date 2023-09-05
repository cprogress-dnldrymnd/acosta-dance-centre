<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Calendar 
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header(); ?>
<section class="calendar">
  <div id="calendar"></div>
</section>
<?php get_footer(); ?>
<script>
  var calendar = jQuery("#calendar").calendarGC({
    events: [
      {
        date: new Date("2023-09-09"),
        eventName: "Holiday",
        className: "my-class",
        onclick(e, data) {
          console.log(data);
        },
        dateColor: "red"
      },
      {
        date: new Date("2022-02-07"),
        eventName: "Holiday with wife",
        className: "my-class",
        onclick(e, data) {
          console.log(data);
        },
        dateColor: "red"
      },
      // ... more events
    ],
    onclickDate: function (e, data) {
      console.log(e, data);
    }
  });
</script>