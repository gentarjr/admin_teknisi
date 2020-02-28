package com.skripsi.teknisi_user.teknisi;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;


import com.skripsi.teknisi_user.R;
import com.skripsi.teknisi_user.konfigurasi.RequestHandler;
import com.skripsi.teknisi_user.konfigurasi.konfigurasi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class History_laporan extends AppCompatActivity{

    private ListView listView;
    private String JSON_STRING;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.history_laporan);

        listView = (ListView) findViewById(R.id.listView);
        getJSON();
    }

    private void showEmployee(){

        JSONObject jsonObject;
        ArrayList<HashMap<String, String>> list = new ArrayList<>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);

            for (int i = 0; i < result.length();i++){

                JSONObject object = result.getJSONObject(i);
                /*String id = object.getString(konfigurasi.TAG_ID);*/
                String teknisi = object.getString(konfigurasi.TAG_TEKNISI);
                String nip = object.getString(konfigurasi.TAG_NIP);
                String tanggal = object.getString(konfigurasi.TAG_TANGGAL);
                String nama = object.getString(konfigurasi.TAG_NAMA);
                String jam = object.getString(konfigurasi.TAG_JAM);
                String kode = object.getString(konfigurasi.TAG_KODE_PERBAIKAN);

                HashMap<String, String> employees = new HashMap<>();
                /*employees.put(konfigurasi.TAG_ID,id);*/
                employees.put(konfigurasi.TAG_TEKNISI,teknisi);
                employees.put(konfigurasi.TAG_NIP,nip);
                employees.put(konfigurasi.TAG_TANGGAL,tanggal);
                employees.put(konfigurasi.TAG_NAMA,nama);
                employees.put(konfigurasi.TAG_JAM,jam);
                employees.put(konfigurasi.TAG_KODE_PERBAIKAN,kode);

                list.add(employees);
            }
        } catch (JSONException e) {
            new AlertDialog.Builder(History_laporan.this)
                    .setMessage(e.getMessage())
                    .show();
        }catch (NullPointerException e){
            new AlertDialog.Builder(History_laporan.this)
                    .setMessage(e.getMessage())
                    .show();
        }

        ListAdapter adapter = new SimpleAdapter(
                History_laporan.this,list,R.layout.list_history,
                new String[] {konfigurasi.TAG_TEKNISI,
                        konfigurasi.TAG_NIP,
                        konfigurasi.TAG_TANGGAL,
                        konfigurasi.TAG_NAMA,
                        konfigurasi.TAG_JAM,
                        konfigurasi.TAG_KODE_PERBAIKAN},
                new int[] {R.id.teknisi,R.id.nip,R.id.tanggal,R.id.nama,R.id.jam,R.id.kode});
        listView.setAdapter(adapter);
    }

    private void getJSON(){

        class GetJSON extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(
                        History_laporan.this,
                        "Mengambil Data",
                        "Mohon tunggu...",
                        false,true);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                JSON_STRING = s;
                showEmployee();
            }

            @Override
            protected String doInBackground(Void... voids) {
                RequestHandler rh = new RequestHandler();
                String s =rh.sendGetRequest(konfigurasi.URL_DETAIL_HISTORY,History_laporan.this);
                return s;
            }
        }

        GetJSON js = new GetJSON();
        js.execute();
    }

}
