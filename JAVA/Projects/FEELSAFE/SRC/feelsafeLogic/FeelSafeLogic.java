package feelsafeLogic;

import java.util.*;
import feelsafeHibernatePackage.*;
import org.hibernate.*;
import org.hibernate.criterion.*;

public class FeelSafeLogic {
	
	public String id1()
	{
		Random random=new Random();
		int i=random.nextInt();
		if(i<0)
		{
			i=-(i);
		}
		if(i<1000)
			i=i+1000;
		while(i>9999)
		{
			i=i/10;
		}
		return i+"";
	}
	
	public String id2()
	{
		Random random=new Random();
		int i=random.nextInt();
		if(i<0)
		{
			i=-(i);
		}
		if(i<10000)
			i=i+10000;
		while(i>99999)
		{
			i=i/10;
		}
		return "PAT-"+i;
	}
	
	public Integer id3()
	{
		Random random=new Random();
		int i=random.nextInt();
		if(i<0)
		{
			i=-(i);
		}
		if(i<1000)
			i=i+1000;
		while(i>9999)
		{
			i=i/10;
		}
		return i;
	}
	
	public Integer verifyUser(String username, String password)
	{
		Session session=HibernateSessionFactory.getSession();
		Criteria criteria=session.createCriteria(Employees.class);
		criteria.add(Expression.eq("username", username));
		criteria.add(Expression.eq("password", password));
		List list=criteria.list();
		Employees employees=new Employees();
		for(Iterator i=list.iterator();i.hasNext();)
		{
			employees=(Employees)i.next();
			return employees.getType();
		}
		return -1;
	}
	
	public Integer addNewEmployee(String username, String password, String firstname, String lastname, String address, String phone, Integer sex, String nationality, String verificationcode, Integer type, String consultinghours, String qualification, String specialist)
	{
		Session session=HibernateSessionFactory.getSession();
		Transaction transaction=session.beginTransaction();
		Employees employees=new Employees();
		try
		{
		employees.setUsername(username);
		employees.setPassword(password);
		employees.setFirstname(firstname);
		employees.setLastname(lastname);
		employees.setAddress(address);
		employees.setPhone(phone);
		employees.setSex(sex);
		employees.setNationality(nationality);
		employees.setVerificationcode(verificationcode);
		employees.setType(type);
		employees.setConsultinghours(consultinghours);
		employees.setQualification(qualification);
		employees.setSpecialist(specialist);
		
		session.save(employees);
		transaction.commit();
		}catch(Exception e)
		{
			return -1;
		}
		 
		return 1;
	}
	
	public List readDoctor()
	{
		Session session=HibernateSessionFactory.getSession();
		Criteria criteria=session.createCriteria(Employees.class);
		criteria.add(Expression.eq("type", 3));
		return criteria.list();
	}
	
	public Integer addNewEquipment(String name, Float price)
	{
		Session session=HibernateSessionFactory.getSession();
		Transaction transaction=session.beginTransaction();
		Otherfees otherfees=new Otherfees();
		try
		{
			otherfees.setId(this.id3());
			otherfees.setEquipmentname(name);
			otherfees.setFees(price);
			session.save(otherfees);
			transaction.commit();
		}catch(Exception e)
		{
			return -1;
		}
		return 1;
	}
	
	public Integer appointmentScheduling(String patientname, Integer patientage, Integer patientsex, String patienthealthproblem, String patientdate, String patienttime)
	{
		Session session=HibernateSessionFactory.getSession();
		Transaction transaction=session.beginTransaction();
		Appointments appointments=new Appointments();
		try
		{
			appointments.setAge(patientage);
			appointments.setAppointmentdate(patientdate);
			appointments.setAppointmenttime(patienttime);
			appointments.setHealthproblem(patienthealthproblem);
			appointments.setId(this.id3());
			appointments.setPatientname(patientname);
			appointments.setSex(patientsex);
			appointments.setType(1);
			
			
			session.save(appointments);
			transaction.commit();
		}catch(Exception e)
		{
			return -1;
		}
		 
		return 1;
	}
	

}
