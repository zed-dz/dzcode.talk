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
  <center>
  <b><font color="#FF0000"> DOCTOR DETAILS</font> </b><br><br>
    <%
    FeelSafeLogic feelSafeLogic=new FeelSafeLogic();
    List list=feelSafeLogic.readDoctor();
    Employees employees;
     %>
    <table border="1">
    <tr><td width="200"><font color="blue"><b> DOCTOR NAME</b></font></td><td width="200"><font color="blue"><b>  FIELD SPECIALIZED</b></font></td><td width="200"><font color="blue"><b> CONSULTING HOURS</b></font></td></tr>
    <%
    for(Iterator i=list.iterator();i.hasNext();)
    {
    	employees=(Employees)i.next();
     %>
     <tr><td><%=employees.getFirstname() %>&nbsp; <%=employees.getLastname() %></td><td><%=employees.getSpecialist() %></td><td><%=employees.getConsultinghours() %></td></tr>
    <%
    }
     %>
    </table>
    </center>
  </body>
</html:html>
