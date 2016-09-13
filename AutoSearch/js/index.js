$("input").keyup(function() {
  var w = $("#type").outerWidth();
  var txt = $("input").val();
  $(".enter li").remove();
  console.log(txt);
  if(txt=='')
  {
    console.log(1);
    $(".select").css('visibility','hidden');
  }
  else
  {
    var txt = $("input").val();
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                arr = this.responseText;
                console.log(arr);
                $(".enter li").remove();
                arr = JSON.parse(arr);
                for (var i = arr.length - 1; i >= 0; i--) {
                  var txt = $("<li></li>").text(arr[i]);
                  $(".enter").append(txt);
                }
            }
        };
        xmlhttp.open("GET", "suggestion.php?q=" + txt, true);
        xmlhttp.send();
    $(".select").css('visibility','visible').outerWidth(w);
  }
});