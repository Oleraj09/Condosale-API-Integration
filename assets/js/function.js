document.addEventListener("DOMContentLoaded", function () {
  var formfield1 = document.getElementById("brokerkey");
  var formfield2 = document.getElementById("brokervalue");
  var formfield3 = document.getElementById("visitorkey");
  var formfield4 = document.getElementById("visitorvalue");
  var formfield5 = document.getElementById("agentkey");
  var formfield6 = document.getElementById("agentvalue");
  window.add1 = function () {
    var input_tags = formfield1.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute(
      "name",
      "broker[key]" + "[" + input_tags.length + "]"
    );
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Agent/Broker API Keys");
    formfield1.appendChild(newField);
  };
  window.remove1 = function () {
    var input_tags = formfield1.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield1.removeChild(input_tags[input_tags.length - 1]);
    }
  };
  window.add2 = function () {
    var input_tags = formfield2.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute(
      "name",
      "broker[value]" + "[" + input_tags.length + "]"
    );
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Agent/Broker Gravity Field ID");
    formfield2.appendChild(newField);
  };
  window.remove2 = function () {
    var input_tags = formfield2.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield2.removeChild(input_tags[input_tags.length - 1]);
    }
  };
  window.add3 = function () {
    var input_tags = formfield3.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute(
      "name",
      "visitor[key]" + "[" + input_tags.length + "]"
    );
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Visitor API Keys");
    formfield3.appendChild(newField);
  };
  window.remove3 = function () {
    var input_tags = formfield3.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield3.removeChild(input_tags[input_tags.length - 1]);
    }
  };
  window.add4 = function () {
    var input_tags = formfield4.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute(
      "name",
      "visitor[value]" + "[" + input_tags.length + "]"
    );
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Visitor Gravity Field ID");
    formfield4.appendChild(newField);
  };
  window.remove4 = function () {
    var input_tags = formfield4.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield4.removeChild(input_tags[input_tags.length - 1]);
    }
  };

  window.add5 = function () {
    var input_tags = formfield5.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute("name", "agent[key]" + "[" + input_tags.length + "]");
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Agent API Keys");
    formfield5.appendChild(newField);
  };
  window.remove5 = function () {
    var input_tags = formfield5.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield5.removeChild(input_tags[input_tags.length - 1]);
    }
  };
  window.add6 = function () {
    var input_tags = formfield6.getElementsByTagName("input");
    var newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute(
      "name",
      "agent[value]" + "[" + input_tags.length + "]"
    );
    newField.setAttribute("class", "text");
    newField.setAttribute("placeholder", "Agent Gravity Field ID");
    formfield6.appendChild(newField);
  };
  window.remove6 = function () {
    var input_tags = formfield6.getElementsByTagName("input");
    if (input_tags.length > 0) {
      formfield6.removeChild(input_tags[input_tags.length - 1]);
    }
  };

  var toggle1 = this.getElementById("toggle1");
  var toggle3 = this.getElementById("toggle3");
  var disapear1 = this.getElementById("disapear1");
  var dis1 = this.getElementById("dis1");
  var i = 0;
  var j = 0;

  window.visitor2 = function () {
    toggle1.classList.remove("hidden");
    dis1.classList.remove("hidden");
    i++;
    checkCondition3();
    return i;
  };

  window.visitor1 = function () {
    toggle3.classList.remove("hidden");
    disapear1.classList.remove("hidden");
    i++;
    checkCondition();
    return i;
  };

  window.count1 = function () {
    j++;
    checkCondition();
    return j;
  };
  window.count4 = function () {
    j++;
    checkCondition3();
    return j;
  };
  function checkCondition() {
    if (i === j) {
      toggle3.classList.add("hidden");
      disapear1.classList.add("hidden");
      i = 0;
      j = 0;
    }
  }
  function checkCondition3() {
    if (i === j) {
      toggle1.classList.add("hidden");
      dis1.classList.add("hidden");
      i = 0;
      j = 0;
    }
  }

  var toggle4 = document.getElementById("toggle4");
  var toggle6 = document.getElementById("toggle6");
  var disapear2 = document.getElementById("disapear2");
  var dis2 = document.getElementById("dis2");
  var k = 0;
  var p = 0;

  window.broker2 = function () {
    toggle4.classList.remove("hidden");
    dis2.classList.remove("hidden");
    k++;
    checkCondition2();
    return k;
  };

  window.broker1 = function () {
    toggle6.classList.remove("hidden");
    disapear2.classList.remove("hidden");
    k++;
    checkCondition1();
    return k;
  };

  window.count2 = function () {
    p++;
    checkCondition1();
    return p;
  };

  window.count3 = function () {
    p++;
    checkCondition2();
    return p;
  };

  function checkCondition1() {
    if (k === p) {
      toggle6.classList.add("hidden");
      disapear2.classList.add("hidden");
      k = 0;
      p = 0;
    }
  }

  function checkCondition2() {
    if (k === p) {
      toggle4.classList.add("hidden");
      dis2.classList.add("hidden");
      k = 0;
      p = 0;
    }
  }

  var dis10 = this.getElementById("dis10");
  var toggle40 = this.getElementById("toggle40");

  var toggle60 = this.getElementById("toggle60");
  var disapear10 = this.getElementById("disapear10");
  var x = 0;
  var y = 0;

  window.agent20 = function () {
    toggle40.classList.remove("hidden");
    dis10.classList.remove("hidden");
    x++;
    checkCondition20();
    return x;
  };
  window.count20 = function () {
    y++;
    checkCondition20();
    return y;
  };

  window.agent10 = function () {
    toggle60.classList.remove("hidden");
    disapear10.classList.remove("hidden");
    x++;
    checkCondition10();
    return x;
  };
  window.count10 = function () {
    y++;
    checkCondition10();
    return y;
  };

  function checkCondition20() {
    if (x === y) {
      toggle40.classList.add("hidden");
      dis10.classList.add("hidden");
      x = 0;
      y = 0;
    }
  }
  function checkCondition10() {
    if (x === y) {
      toggle60.classList.add("hidden");
      disapear10.classList.add("hidden");
      x = 0;
      y = 0;
    }
  }
});
