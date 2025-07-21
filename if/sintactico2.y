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

%start Sentencias

%token <real> NUMERO
%token IF
%token THEN
%token ELSE 
%token MAS
%token IGUAL
%token PTOCOMA
%token POR
%token PAA
%token PAC

%type <real> Exp
%type <real> Calc
%type <real> Sentencias
%type <real> Sentencia

%left MAS
%left POR

%%
/* Reglas gramaticales */

Sentencias:     Sentencias Sentencia
                | Sentencia
                ;

Sentencia:      Calc PTOCOMA        { printf("%4.1f\n", $1); }
                | IF Exp THEN Sentencia ELSE Sentencia { if ($2 != 0) ; else ;}
                ;

Calc:           Exp                              { $$ = $1; }
                | IF Exp THEN Calc ELSE Calc { if ($2 != 0) $$ = $4; else $$ = $6; }
                ;

Exp:        NUMERO          {$$=$1};
            | Exp MAS Exp   {$$=$1+$3};
            | Exp POR Exp   {$$=$1*$3};
            | PAA Exp PAC   {$$=$2};
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