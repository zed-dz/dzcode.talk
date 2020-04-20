<%@ page language="java" pageEncoding="ISO-8859-1"%>
<%@ page language="java" import="feelsafeHibernatePackage.*, feelsafeLogic.*, java.util.* " %>

<%@ taglib uri="http://jakarta.apache.org/struts/tags-bean" prefix="bean" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-html" prefix="html" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-logic" prefix="logic" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-tiles" prefix="tiles" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-template" prefix="template" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-nested" prefix="nested" %>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html:html locale="true">
  <head>
    <html:base />
    
    <title>employees.jsp</title>

	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

  </head>
  
  <body>
    <html:form action="/feelSafe.do?do=appointmentreports1">
  <center>
  <b><font color="#FF0000"> APPOINTMENT REPORTS</font> </b><br><br>
  
  <%
    FeelSafeLogic feelSafeLogic=new FeelSafeLogic();
    List list=feelSafeLogic.readDoctor();
    Employees employees;
    int j=0;
     %>
     
  <table>
  <tr><td align="right">Doctor Name</td><td><html:select property="doctorname"><html:option value="select">---- Select ----</html:option> 
     <%
    for(Iterator i=list.iterator();i.hasNext();)
    {
    	j++;
    	employees=(Employees)i.next();
     %>
     <html:option value="v<%=j %>"> <%=employees.getFirstname() %>&nbsp; <%=employees.getLastname() %> </html:option>
<%
}
 %>     
  </html:select></td></tr>
  <tr><td align="right">Specialist in the Field of</td><td><html:select property="specialist"><html:option value="select">---- Select ----</html:option> 
  
  
      <%
      j=0;
    for(Iterator i=list.iterator();i.hasNext();)
    {
    	j++;
    	employees=(Employees)i.next();
     %>
     <html:option value="v<%=j %>"><%=employees.getSpecialist() %></html:option>
<%
}
 %>    
  
  </html:select></td></tr>
  </table>
  <br><br>
    <table border="1">
    <tr><td width="200"><font color="blue"><b> PATIENT NAME</b></font></td><td width="155"><font color="blue"><b>  USER ID</b></font></td><td width="155"><font color="blue"><b> DATE</b></font></td><td width="240"><font color="blue"><b> CONSULTATION TIME</b></font></td></tr>
    </table>
    </center>
    </html:form>
  </body>
</html:html>
