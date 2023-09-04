-- UPDATE의 기본구조
-- UPDATE 테이블명
-- SET ( 컬럼1 = 값1, 컬럼2 = 값2 )
-- WHERE 조건
-- **추가 설명: 조건을 적지 않을 경우 모든 레코드가 수정
-- 			실수를 방지하기 위해 WHERE절을 먼저 작성하고 SET절을 작성

UPDATE titles
SET title = 'CEO'
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;

-- 500000번 사원의 직급을 'Staff', 연봉을 25000로 UPDATE
UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;
SELECT * FROM salaries WHERE emp_no = 500000;