$("table tbody tr").on("click", function(){
  let $this = $(this),
      id    = $this.find("th[scope=row]").text();
  window.location.href = "/public/order/" + id;
})
