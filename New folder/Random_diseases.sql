set serveroutput on;
<<global>>
DECLARE
v_n INTEGER := 0;
v_contor NUMBER :=0;
v_disease_name diseases.disease_name%TYPE := 'Boala';
v_salt NUMBER;
v_sugar NUMBER;
v_fats NUMBER;
v_carbs NUMBER;
v_fiber NUMBER;
v_protein NUMBER;
v_calories NUMBER;
v_saturates NUMBER;


BEGIN
    delete from DISEASES;
    while(v_contor < 10000) loop
		v_contor:=v_contor+1;
		v_disease_name := 'Boala'||TO_CHAR(v_contor);
		v_salt := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_sugar := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_fats := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_carbs := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_fiber := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_protein := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_calories := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_saturates := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		
		
		insert into DISEASES values(v_contor,v_disease_name,v_disease_name,v_salt,v_sugar,v_fats, v_carbs,v_fiber, v_protein, v_calories, v_saturates);	
	end loop;
	       
END;
--SELECT * FROM DESEASES ORDER BY ID;