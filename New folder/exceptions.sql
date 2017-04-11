CREATE OR REPLACE PACKAGE exceptie AS
    produs_inexistent EXCEPTION;
    PRAGMA EXCEPTION_INIT(produs_inexistent, -20001);
    e_inexistent EXCEPTION;
    PRAGMA EXCEPTION_INIT(e_inexistent, -20002);
    parola_scurta EXCEPTION;
    PRAGMA EXCEPTION_INIT(parola_scurta, -20003);
END exceptie;
/

CREATE OR REPLACE PACKAGE BODY exceptie AS
    EXCEPTION
    WHEN produs_inexistent THEN
        raise_application_error (-20001, 'Produsul cautat nu exista in baza de date.');
    
END exceptie;
/