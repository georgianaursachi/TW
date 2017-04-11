DECLARE
  v_n INTEGER := 1;
  v_id users.id%type;
  v_first_name VARCHAR(50);
  v_last_name VARCHAR(50);
  v_email users.email%type;
  v_password users.password%type;
  v_j INTEGER;
  v_i INTEGER;
  v_number_of_lines NUMBER;
  
  
BEGIN
  DELETE FROM USERS;
  
  WHILE (v_n <= 10000) 
  LOOP
    SELECT COUNT(*) + 1 INTO v_id FROM USERS;
    SELECT COUNT(*) INTO v_number_of_lines FROM TEST;
    DECLARE
      v_random_number1 NUMBER := TRUNC(DBMS_RANDOM.VALUE(1, v_number_of_lines + 1));
      v_random_number2 NUMBER := TRUNC(DBMS_RANDOM.VALUE(1, v_number_of_lines + 1));
    BEGIN
      
      SELECT LAST_NAME INTO v_last_name FROM 
         (SELECT last_name FROM (SELECT last_name FROM TEST ORDER BY last_name) 
             WHERE ROWNUM <= v_random_number1 
       MINUS 
           SELECT last_name FROM (SELECT last_name FROM TEST ORDER BY last_name) 
             WHERE ROWNUM <= v_random_number1 - 1);
             
      SELECT FIRST_NAME INTO v_first_name FROM 
         (SELECT first_name FROM (SELECT first_name FROM TEST ORDER BY first_name) 
             WHERE ROWNUM <= v_random_number2 
       MINUS 
           SELECT first_name FROM (SELECT first_name FROM TEST ORDER BY first_name) 
             WHERE ROWNUM <= v_random_number2 - 1);
             
    END;
    
    v_email := LOWER(v_first_name)||'.'||LOWER(v_last_name)||TO_CHAR(v_id)||'@yahoo.com'; --creare e-mail unic
    
    SELECT RANDOM_STR(TRUNC(dbms_random.value() * 10 + 5)) INTO v_password FROM dual; --creare parola
  
    INSERT INTO USERS values(v_id, v_first_name, v_last_name, v_email, v_password);	
    v_n := v_n + 1;
    END LOOP;
END;

