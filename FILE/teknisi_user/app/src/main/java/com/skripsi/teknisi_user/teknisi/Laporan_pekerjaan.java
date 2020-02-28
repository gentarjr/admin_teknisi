package com.skripsi.teknisi_user.teknisi;

import android.annotation.SuppressLint;
import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.app.TimePickerDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.skripsi.teknisi_user.R;
import com.skripsi.teknisi_user.konfigurasi.RequestHandler;
import com.skripsi.teknisi_user.konfigurasi.konfigurasi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Calendar;
import java.util.HashMap;

public class Laporan_pekerjaan extends AppCompatActivity implements View.OnClickListener {

    private EditText txt_teknisi,txt_nip, tanggal_kegiatan, waktu_kegiatan;
    private RadioGroup grup_nama, grup_kode;

    private RadioButton maintenance;
    private RadioButton perbaikan;
    private RadioButton dll;
    private RadioButton cash;
    private RadioButton reject;

    private RadioButton a1;
    private RadioButton a2;
    private RadioButton a3;
    private RadioButton a4;
    private RadioButton a5;

    public String mtc_a= "MAINTENANCE";
    public String prbk_a= "PERBAIKAN";
    public String dll_a= "DLL";
    public String cas_a= "CASH";
    public String reject_a= "REJECT";

    public String a1_= "A1-FLM";
    public String a2_= "A2-REJECT CARD";
    public String a3_= "A3-INSTALASI";
    public String a4_= "A4-SETTINGS";
    public String a5_= "A5-CARTRIDGE";


    private Button btn_date, btn_time, btn_simpan_kegiatan;

    private int mYear, mMonth, mDay, mHour, mMinute;

    private String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.laporan_pekerjaan);

        txt_teknisi = (EditText) findViewById(R.id.txt_teknisi);
        txt_nip = (EditText) findViewById(R.id.txt_nip);
        tanggal_kegiatan = (EditText) findViewById(R.id.tanggal_kegiatan);

        grup_nama = (RadioGroup) findViewById(R.id.grup_nama);
        maintenance = (RadioButton) findViewById(R.id.maintenance);
        perbaikan = (RadioButton) findViewById(R.id.perbaikan);
        dll = (RadioButton) findViewById(R.id.dll);
        cash = (RadioButton) findViewById(R.id.cash);
        reject = (RadioButton) findViewById(R.id.reject);

        grup_kode = (RadioGroup) findViewById(R.id.grup_kode);
        a1 = (RadioButton) findViewById(R.id.a1);
        a2 = (RadioButton) findViewById(R.id.a2);
        a3 = (RadioButton) findViewById(R.id.a3);
        a4 = (RadioButton) findViewById(R.id.a4);
        a5 = (RadioButton) findViewById(R.id.a5);

        btn_date = (Button) findViewById(R.id.btn_date);
        waktu_kegiatan = (EditText) findViewById(R.id.waktu_kegiatan);
        btn_time = (Button) findViewById(R.id.btn_time);
        btn_simpan_kegiatan = (Button) findViewById(R.id.btn_simpan_kegiatan);

        btn_date.setOnClickListener(this);
        btn_time.setOnClickListener(this);
        btn_simpan_kegiatan.setOnClickListener(this);
    }

    private void showEmployee(String json){
        try {

            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(    0);
            txt_teknisi.setText(c.getString(konfigurasi.TAG_TEKNISI));
            txt_nip.setText(c.getString(konfigurasi.TAG_NIP));
            tanggal_kegiatan.setText(c.getString(konfigurasi.TAG_TANGGAL));

            waktu_kegiatan.setText(c.getString(konfigurasi.TAG_JAM));

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    public void updateEmployee(){
        final String teknisi = txt_teknisi.getText().toString().trim();
        final String nip = txt_nip.getText().toString();
        final String tanggal = tanggal_kegiatan.getText().toString();
        final String jam = waktu_kegiatan.getText().toString();


        class UpdateEmployee extends AsyncTask<Void, Void, String> {

            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(
                        Laporan_pekerjaan.this,"Mengubah",
                        "Tunggu Sebentar...",false,false
                );

            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(Laporan_pekerjaan.this, s, Toast.LENGTH_SHORT).show();
            }

            @SuppressLint("WrongThread")
            @Override
            protected String doInBackground(Void... voids) {

                HashMap<String, String> map = new HashMap<>();
                map.put(konfigurasi.KEY_EMP_TEKNISI,teknisi);
                map.put(konfigurasi.KEY_EMP_NIP,nip);
                map.put(konfigurasi.KEY_TANGGAL,tanggal);
                if (maintenance.isChecked()==true){
                    map.put(konfigurasi.KEY_NAMA_KEGIATAN,String.valueOf(mtc_a));
                }else if(perbaikan.isChecked()==true){
                    map.put(konfigurasi.KEY_NAMA_KEGIATAN,String.valueOf(prbk_a));
                }else if(dll.isChecked()==true){
                    map.put(konfigurasi.KEY_NAMA_KEGIATAN,String.valueOf(dll_a));
                }else if(cash.isChecked()==true){
                    map.put(konfigurasi.KEY_NAMA_KEGIATAN,String.valueOf(cas_a));
                }else if(reject.isChecked()==true){
                    map.put(konfigurasi.KEY_NAMA_KEGIATAN,String.valueOf(reject_a));
                }
                map.put(konfigurasi.KEY_JAM,jam);

                if (a1.isChecked()==true){
                    map.put(konfigurasi.KEY_KODE_PERBAIKAN,String.valueOf(a1_));
                }else if(a2.isChecked()==true){
                    map.put(konfigurasi.KEY_KODE_PERBAIKAN,String.valueOf(a2_));
                }else if(a3.isChecked()==true){
                    map.put(konfigurasi.KEY_KODE_PERBAIKAN,String.valueOf(a3_));
                }else if(a4.isChecked()==true){
                    map.put(konfigurasi.KEY_KODE_PERBAIKAN,String.valueOf(a4_));
                }else if(a5.isChecked()==true){
                    map.put(konfigurasi.KEY_KODE_PERBAIKAN,String.valueOf(a5_));
                }
                RequestHandler rh = new RequestHandler();
                return rh.sendPostRequest(konfigurasi.URL_INSERT_KEGIATAN,map);

            }
        }

        new UpdateEmployee().execute();
    }
    @Override
    public void onClick(View view) {
        if (view == btn_simpan_kegiatan){
            updateEmployee();
        }

        if (view == btn_date) {

            // Get Current Date
            final Calendar c = Calendar.getInstance();
            mYear = c.get(Calendar.YEAR);
            mMonth = c.get(Calendar.MONTH);
            mDay = c.get(Calendar.DAY_OF_MONTH);


            DatePickerDialog datePickerDialog = new DatePickerDialog(this,
                    new DatePickerDialog.OnDateSetListener() {

                        @Override
                        public void onDateSet(DatePicker view, int year,
                                              int monthOfYear, int dayOfMonth) {

                            tanggal_kegiatan.setText(year + "-" + (monthOfYear + 1) + "-" + dayOfMonth);

                        }
                    }, mYear, mMonth, mDay);
            datePickerDialog.show();
        }

        if (view == btn_time) {

            // Get Current Time
            final Calendar c = Calendar.getInstance();
            mHour = c.get(Calendar.HOUR_OF_DAY);
            mMinute = c.get(Calendar.MINUTE);

            // Launch Time Picker Dialog
            TimePickerDialog timePickerDialog = new TimePickerDialog(this,
                    new TimePickerDialog.OnTimeSetListener() {

                        @Override
                        public void onTimeSet(TimePicker view, int hourOfDay,
                                              int minute) {

                            waktu_kegiatan.setText(hourOfDay + ":" + minute);
                        }
                    }, mHour, mMinute, false);
            timePickerDialog.show();
        }
    }
}
