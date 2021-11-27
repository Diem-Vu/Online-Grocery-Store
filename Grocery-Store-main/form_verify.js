function checkAddress()
{
  var address = document.getElementById("Address Line").value;

  if(address == '')
  {
    document.getElementById("error1").innerHTML = "<span style='color:red'>Missing Address Line</span>"
    return false;
  }
  else
  {
    if (/[^0-9a-zA-Z_ ]/.test(address))
    {
      document.getElementById("error1").innerHTML = "<span style='color:red'>Enter Letters or Numbers Only</span>"
      return false;
    }
  }
  document.getElementById("error1").innerHTML = "<span></span>"
  return true;
}

function checkCity()
{
  var city = document.getElementById("City").value;

  if(city == '')
  {
    document.getElementById("error2").innerHTML = "<span style='color:red'>Missing City</span>"
    return false;
  }
  else
  {
    if (/[^a-zA-Z_ ]/.test(city))
    {
      document.getElementById("error2").innerHTML = "<span style='color:red'>Enter Letters Only</span>"
      return false;
    }
  }
  document.getElementById("error2").innerHTML = "<span></span>"
  return true;
}

function checkZip()
{
  var zip = document.getElementById("Zip Code").value;

  if(zip == '')
  {
    document.getElementById("error3").innerHTML = "<span style='color:red'>Missing Zip Code</span>"
    return false;
  }
  else
  {
    if (zip.length != 5)
    {
      document.getElementById("error3").innerHTML = "<span style='color:red'>Enter 5 digit number</span>"
      return false;
    }
    else
    {
        if (isNaN(zip))
        {
          document.getElementById("error3").innerHTML = "<span style='color:red'>Enter Numbers Only</span>"
          return false;
        }
     }
  }
  document.getElementById("error3").innerHTML = "<span></span>"
  return true;
}

function checkName()
{
  var name = document.getElementById("NameonCard").value;

  if(name == '')
  {
    document.getElementById("error4").innerHTML = "<span style='color:red'>Missing Name</span>"
    return false;
  }
  else
  {
    if (/[^a-zA-Z_ ]/.test(name))
    {
      document.getElementById("error4").innerHTML = "<span style='color:red'>Enter Letters Only</span>"
      return false;
    }
  }
  document.getElementById("error4").innerHTML = "<span></span>"
  return true;
}

function checkZip2()
{
  var zip2 = document.getElementById("Zip Code2").value;

  if(zip2 == '')
  {
    document.getElementById("error5").innerHTML = "<span style='color:red'>Missing Zip Code</span>"
    return false;
  }
  else
  {
    if (zip2.length != 5)
    {
      document.getElementById("error5").innerHTML = "<span style='color:red'>Enter 5 digit number</span>"
      return false;
    }
    else
    {
        if (isNaN(zip2))
        {
          document.getElementById("error5").innerHTML = "<span style='color:red'>Enter Numbers Only</span>"
          return false;
        }
     }
  }
  document.getElementById("error5").innerHTML = "<span></span>"
  return true;
}

function checkAddress2()
{
  var address2 = document.getElementById("Address Line2").value;

  if(address2 == '')
  {
    document.getElementById("error6").innerHTML = "<span style='color:red'>Missing Address Line</span>"
    return false;
  }
  else
  {
    if (/[^0-9a-zA-Z_ ]/.test(address2))
    {
      document.getElementById("error6").innerHTML = "<span style='color:red'>Enter Letters or Numbers Only</span>"
      return false;
    }
  }
  document.getElementById("error6").innerHTML = "<span></span>"
  return true;
}

function checkCity2()
{
  var city2 = document.getElementById("City2").value;

  if(city2 == '')
  {
    document.getElementById("error7").innerHTML = "<span style='color:red'>Missing City</span>"
    return false;
  }
  else
  {
    if (/[^a-zA-Z_ ]/.test(city2))
    {
      document.getElementById("error7").innerHTML = "<span style='color:red'>Enter Letters Only</span>"
      return false;
    }
  }
  document.getElementById("error7").innerHTML = "<span></span>"
  return true;
}

function checkZip3()
{
  var zip3 = document.getElementById("Zip Code3").value;

  if(zip3 == '')
  {
    document.getElementById("error8").innerHTML = "<span style='color:red'>Missing Zip Code</span>"
    return false;
  }
  else
  {
    if (zip3.length != 5)
    {
      document.getElementById("error8").innerHTML = "<span style='color:red'>Enter 5 digit number</span>"
      return false;
    }
    else
    {
        if (isNaN(zip3))
        {
          document.getElementById("error8").innerHTML = "<span style='color:red'>Enter Numbers Only</span>"
          return false;
        }
     }
  }
  document.getElementById("error8").innerHTML = "<span></span>"
  return true;
}
