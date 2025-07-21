%{
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
extern int yylex(void);
extern char *yytext;
extern int linea;
extern FILE *yyin;
void yyerror(char *s);
%}

/* Declaraciones de Bison*/
/* de la menos significativa a la mas significativa */
%union
{
    float real;
}

%start Exp_1

%token <real> NUMERO 
%token MAS
%token IGUAL
%token PTOCOMA
%token POR
%token PAA
%token PAC

%type <real> Exp
%type <real> Calc
%type <real> Exp_1

%left MAS
%left POR

%%
/* Reglas gramaticales */

Exp_1:      Exp_1 Calc
            | Calc
            ;

Calc:       Exp PTOCOMA    {printf("%4.1f\n", $1);}
            | IF Exp THEN Calc ELSE Calc {if($2!=0)$$=$4;else$$=$6; printf("%4.1f\n", $$);};

Exp:        NUMERO          {$$=$1;}
            | Exp MAS Exp   {$$=$1+$3;}
            | Exp POR Exp   {$$=$1*$3;}
            | PAA Exp PAC   {$$=$2;}
            ;
%%

/* Codigo C adicional */
void yyerror(char *s)
{
    printf("Error sintactico %s", s);
}

int main(int argc, char **argv)
{
    if(argc > 1)
    {
        yyin = fopen(argv[1],"rt");
    }
    else
    {
        yyin = stdin;
    }
    yyparse();
    return 0;
}