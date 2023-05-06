// Select all the required DOM elements
const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const selectEvent = document.getElementById("event");
let count = document.getElementById("count");
let total = document.getElementById("total");

populateUI();
let ticketPrice = +selectEvent.value;


function setEventData(eventIndex, eventPrice) {
  localStorage.setItem("selectedEventIndex", eventIndex);
  localStorage.setItem("selectedEventPrice", eventPrice);
}


function updateCountAndTotal() {
  let selectedSeatsCount = document.querySelectorAll(".row .seat.selected");
  count.innerHTML = selectedSeatsCount.length;
  ticketPrice
    ? (total.innerText = selectedSeatsCount.length * ticketPrice)
    : (total.innerText = " => Please select an Event");

  const seatsIndex = [...selectedSeatsCount].map((seat) =>

    [...seats].indexOf(seat)
  );
  localStorage.setItem("seatIndex", JSON.stringify(seatsIndex));
}

function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("seatIndex"));

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected");
      }
    });
  }
  const selectedEventIndex = localStorage.getItem("selectedEventIndex");

  if (selectedEventIndex !== null) {
    selectEvent.selectedIndex = selectedEventIndex;
  }
}

selectEvent.addEventListener("change", (e) => {
  ticketPrice = +e.target.value;
  setEventData(e.target.selectedIndex, e.target.value);
  updateCountAndTotal();
});

container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");

    updateCountAndTotal();
  }
});

updateCountAndTotal();
